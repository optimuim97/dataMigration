<?php

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

function responseForm($data, int $status, $message= "OK"){
    return [
        "data"=> $data,
        "message"=> $message,
        "status_code"=> $status
    ];
}

function getJson(
    SerializerInterface $serializer,
    $data,
    string $groupname
) {
    
    $dataJson = $serializer->serialize(
        $data,
        JsonEncoder::FORMAT,
        [AbstractNormalizer::GROUPS => $groupname]
    );

    return json_decode($dataJson);
}


function getJuridiqueForm($code){
    switch ($code) {
        case '':
            return "";
            break;
        
        default:
            "";
            break;
    }
}

function getSecteur($code){
    switch ($code) {
        case '':
            return "";
            break;
        
        default:
            "";
            break;
    }
}


