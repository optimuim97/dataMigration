<?php

namespace App\Controller;

use Amp\Pipeline\Queue;
use App\Entity\DataFile;
use App\Entity\LoopLog;
use App\Helpers\HttpGuzzle;
use App\Repository\DataFileRepository;
use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Client\Browser;
use DeviceDetector\Parser\OperatingSystem;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use function Amp\async;
use function Amp\delay;

class ApaymProMultipleController extends AbstractController
{

    public function __construct(private EntityManagerInterface $em, private ValidatorInterface $validator,private HttpGuzzle $httpGuzzle, private DataFileRepository $dataFileRepository, private SerializerInterface $serializer)
    {
    }

    #[Route('/api/v1/create-apaympro-multiple', name: 'app_account_http', methods: ["POST"])]
    public function addHttpAccountLoop(Request $request)
    {

        $excelFile = null;
        $response = [];
        $data = json_decode($request->getContent(), true);

        if ($data == []) {
            $data = $request->request->all();
        }

        $range = (int) $data['range'];
        /*Device*/
        $deviceData = $this->getDeviceData();

        /*File*/
        $file = $request->files->get('excel_file', $deviceData); // Get the file from the sent request

        if (!empty($file)) {

            $queue = new Queue();
            $start = \microtime(true);
            $elapsed = fn () => \microtime(true) - $start;

            $dataExtrator = $this->xslx($file, $deviceData);

            $fileSaved =  $dataExtrator['dataFile'];
            $excelFile = $dataExtrator['extractData'];

            // dd($excelFile);

            (new Session())->set('total', 0);
            (new Session())->set('success_apaym_count', 0);
            (new Session())->set('success_apaym_pro_count', 0);
            (new Session())->set('apaym_pro_temp_count', 0);
            (new Session())->set('error_apaym_pro_temp_count', 0);
            (new Session())->set('error_count', 0);
            (new Session())->set('existing_count', 0);
            (new Session())->set('responseData', []);

            //TODO save data on own database
            /*Loop*/
            foreach ($excelFile as $key => $row) {
                if ($key <= $range) {
                    delay(0.1);

                    async(function () use ($row, $key, $fileSaved) {
                        $total = (new Session())->get('total');
                        (new Session())->set('total', $total + 1);

                        try {

                            $response = ($this->httpGuzzle->createApaymPro($row, $key, $fileSaved));
                            $responseArr = (new Session())->get('responseData');
                            array_push($responseArr, $response);

                            (new Session())->set('responseData', $responseArr);

                        } catch (Exception $e) {

                            $error = (new Session())->get('error_count') + 1;
                            (new Session())->set('error_count', $error);

                            $exception = (new LoopLog);
                            $exception
                                ->setStatusCode($e->getCode())
                                ->setMessage($e->getMessage())
                                ->setPosition($key)
                                ->setIsLoopError(true)
                                ->setLogDescription($e->getMessage())
                                ->setIsLoopError(true)
                                ->setFile($fileSaved);

                            $this->em->persist($exception);
                            $this->em->flush();

                        }
                    });
                }
            }

            $queue->complete();

            /*Session*/
            $total = (new Session())->get('total');
            $success_apaym_count = (new Session())->get('success_apaym_count');
            $success_apaym_pro_count = (new Session())->get('success_apaym_pro_count');
            $apaym_pro_temp_count = (new Session())->get('apaym_pro_temp_count');
            $error_apaym_pro_temp_count = (new Session())->get('error_apaym_pro_temp_count');
            $error_count = (new Session())->get('error_count');
            $existing_count = (new Session())->get('existing_count');
            $responseData = (new Session())->get('responseData');

            (new Session())->invalidate();

            /*Result*/
            return $this->json([
                "success" => "OK",
                "total" => $total,
                "success_apaym_count" => $success_apaym_count,
                "success_apaym_pro_count" => $success_apaym_pro_count,
                "apaym_pro_temp_count" => $apaym_pro_temp_count,
                "error_apaym_pro_temp_count" => $error_apaym_pro_temp_count,
                "error_count" => $error_count,
                "existing_count" => $existing_count,
                "elapsed" => $elapsed(),
                "responseData" => $responseData
            ]);
        }

        return $this->json([
            "error" => "The excel file has not be uploaded"
        ]);
    }

    public function getDeviceData()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse
        $clientHints = ClientHints::factory($_SERVER); // client hints are optional

        $dd = new DeviceDetector($userAgent, $clientHints);
        $osFamily = OperatingSystem::getOsFamily($dd->getOs('name'));
        $browserFamily = Browser::getBrowserFamily($dd->getClient('name'));

        $device_type = $osFamily;
        $device_name = "";
        $browser_name = $browserFamily;

        $deviceData['ip'] = "";
        $deviceData['device_type'] = $device_type;
        $deviceData['device_name'] = $device_name;
        $deviceData['browser_name'] = $browser_name;

        return $deviceData;
    }

    public function xslx($file, $deviceData)
    {
        $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored

        $time = new \DateTime();
        $date = $time->format("H:i:s Y-m-d"); // converted new date
        $filePathName = "$date|" . $file?->getClientOriginalName();

        if ($filePathName == false) {
            return false;
        }

        $extractData = [];

        $dataFileEntity = new DataFile();
        $dataFileEntity->setName($filePathName);
        $dataFileEntity->setStatus("uploaded");
        $dataFileEntity->setSaved("");
        $dataFileEntity->setUnsaved("");
        $dataFileEntity->setActiveUser(json_encode($deviceData));
        $this->em->persist($dataFileEntity);
        $this->em->flush();

        try {
            $file->move($fileFolder, $filePathName);
        } catch (FileException $e) {
            return [
                "message" => $e->getMessage(),
                "code" => $e->getCode(),
            ];
        }

        $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file 
        $sheetData = $spreadsheet->getActiveSheet()->toArray(false, true, true, true); // here, the read data is turned into an array

        $headers = $sheetData["1"];
        unset($sheetData["1"]);

        foreach ($sheetData as $key => $value) {
            $array_merged_key = array_combine($headers, $value);
            array_push($extractData, $array_merged_key);
        }

        return [
            "dataFile" => $dataFileEntity,
            "extractData" => $extractData
        ];
    }
}
