<?php

namespace App\Helpers;

use App\Entity\DataFile;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class DataExtrator extends AbstractController
{
    public function xslx($file, $deviceData)
    {
        $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored

        $time = new \DateTime();
        $date = $time->format("H:i:s Y-m-d"); // converted new date
        $filePathName = "$date|" . $file->getClientOriginalName();

        $extractData = [];

        $dataFileEntity = new DataFile();
        $dataFileEntity->setName($filePathName);
        $dataFileEntity->setStatus("uploaded");
        $dataFileEntity->setSaved("");
        $dataFileEntity->setUnsaved("");
        $dataFileEntity->setActiveUser(json_encode($deviceData));

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
