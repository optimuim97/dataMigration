<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Helpers\HttpRequest;
use App\Repository\DataFileRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Helpers\HttpGuzzle;
use Exception;

class FileManageController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em, private ValidatorInterface $validator,private HttpGuzzle $httpGuzzle, private DataFileRepository $dataFileRepository, private SerializerInterface $serializer)
    {
    }

    #[Route('/api/v1/file-list')]
    public function getFileList()
    {
        try {
            $files = $this->dataFileRepository->findBy(
                array(),
                array('id' => 'DESC'),
                1000
            );
            
            $fileList = getJson($this->serializer,$files, "file");
            return $this->json(responseForm($fileList, 200));

        } catch (Exception $e) {
            return $this->json(responseForm($e, $e->getCode(), $e->getMessage()));
        }
    }

    #[Route('/api/v1/get-error-uploader-file/{id}')]
    public function getErrorByUplpoadedFile($id)
    {
        try {

            $existing = [];
            $errors = [];
            $success = [];
            $fileData =  $this->dataFileRepository->find($id);

            if (!empty($fileData)) {

                $unsavedFile = getJson($this->serializer, $fileData->getLoopLogs(), "log");
                $data['fileData'] = getJson($this->serializer, $fileData, "file");

                foreach ($unsavedFile as $item) {
                    if ($item->statusCode == "4") {
                        array_push($existing, $item);
                    } elseif($item->statusCode== "1"){
                        array_push($success, $item);
                    }elseif($item->statusCode== "3"){
                        array_push($errors, $item);
                    }else{
                        array_push($errors, $item);                        
                    }
                }

                $data['existing'] = $existing;
                $data['errors'] = $errors;

                return $this->json(responseForm($data, Response::HTTP_OK, "OK"));
            }

        } catch (Exception $e) {

            return $this->json(responseForm($e, $e->getCode(), $e->getMessage()));
        }
    }

}
