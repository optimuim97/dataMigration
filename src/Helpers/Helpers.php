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


function getSecteur($code){
    switch ($code) {
        case 'A0101':
            return "AGRICULTURE VIVRIERE";
            break;
        
        case 'A0103':
            return "ELEVAGE ET CHASSE";
            break;
        case 'A0301':
            return "PECHE ";
            break;
        case 'A0302':
            return "AQUACULTURE, PISCICULTURE";
            break;
        case 'C1001':
            return "ABATTAGE, TRANSFORMATION ET CONSERVATION DE LA VIANDE ET PREPARATION DE PRODUITS A BASE DE VIANDE";
            break;
        case 'C1006':
            return "FABRICATION DE PRODUITS ALIMENTAIRES A BASE DE CEREALES N.C.A.";
            break;
        case 'C1007':
            return "TRANSFORMATION DU CACAO ET DU CAFÉ ";
            break;
        case 'C1008':
            return "FABRICATION D’AUTRES PRODUITS ALIMENTAIRES";
            break;
        case 'C1101':
            return "FABRICATION DE BOISSONS ALCOOLISÉES";
            break;
        case 'C1102':
            return "FABRICATION DE BOISSONS NON ALCOOLISES ET D'EAUX MINERALES";
            break;
        case 'C1302':
            return "FABRICATION D'AUTRES ARTICLES TEXTILES";
            break;
        case 'C1402':
            return "SERVICE DE COUTURE  SUR MESURE";
            break;
        case 'C1502':
            return "FABRICATION DE CHAUSSURES ET ARTICLES CHAUSSANTS";
            break;
        case 'C1601':
            return "TRAVAIL DU BOIS";
            break;
        case 'C1700':
            return "FABRICATION DE PAPIER, CARTONS ET D’ARTICLES EN PAPIER OU EN CARTON";
            break;
        case 'C1801':
            return "IMPRIMERIE ET ACTIVITES CONNEXES";
            break;
        case 'C2202':
            return "TRAVAIL DU PLASTIQUE";
            break;
        case 'C2302':
            return "FABRICATION DE PRODUITS CÉRAMIQUES ";
            break;
        case 'C2502':
            return "FABRICATION D'AUTRES OUVRAGES EN METAUX; TRAVAIL DES METAUX";
            break;
        case 'C3100':
            return "FABRICATION DE MEUBLES ET MATELAS";
            break;
        case 'E3800':
            return "COLLECTE, TRAITEMENT ET ELIMINATION DES DECHETS ; RECUPERATION";
            break;
        case 'F4101':
            return "PROMOTION IMMOBILIÈRE";
            break;
        case 'G4501':
            return "COMMERCE DE VÉHICULES AUTOMOBILES";
            break;
        case 'G4502':
            return "ENTRETIEN ET REPARATION DE VEHICULES AUTOMOBILES";
            break;
        case 'G4503':
            return "COMMERCE DE PIECES DETACHEES ET D'ACCESSOIRES AUTOMOBILES";
            break;
        case 'G4504':
            return "COMMERCE ET RÉPARATION DE MOTOCYCLES";
            break;
        case 'G4601':
            return "ACTIVITES DES INTERMEDIAIRES DU COMMERCE DE GROS";
            break;
        case 'G4701':
            return "COMMERCE DE DETAIL EN MAGASIN NON SPECIALISE";
            break;
        case 'G4702':
            return "COMMERCE DE DETAIL EN MAGASIN SPECIALISE";
            break;
        case 'G4703':
            return "COMMERCE DE DÉTAIL HORS MAGASIN";
            break;
        case 'I5500':
            return "HEBERGEMENT";
            break;
        case 'I5601':
            return "RESTAURATION";
            break;
        case 'I5602':
            return "ACTIVITÉS DES DÉBITS DE BOISSONS";
            break;
        case 'J5901':
            return "PRODUCTION VIDÉO : CINÉMA ET TÉLÉVISION ";
            break;
        case 'J5902':
            return "PRODUCTION AUDIO ET ÉDITION MUSICALE";
            break;
        case 'J6200':
            return "ACTIVITÉS INFORMATIQUES : CONSEIL, PROGRAMMATION";
            break;
        case 'K6600':
            return "ACTIVITÉS D'AUXILIAIRES FINANCIERS ET D'ASSURANCE";
            break;
        case 'L6802':
            return "ACTIVITÉS DES AGENCES IMMOBILIÈRES";
            break;
        case 'N7700':
            return "LOCATION ET LOCATION-BAIL";
            break;
        case 'P8504':
            return "AUTRES ACTIVITÉS D'ENSEIGNEMENT";
            break;
        case 'R9000':
            return "ACTIVITES CREATIVES, ARTISTIQUES ET DE SPECTACLE";
            break;
        case 'R9301':
            return "ACTIVITÉS LIÉES AU SPORT";
            break;
        case 'R9302':
            return "ACTIVITÉS RÉCRÉATIVES ET DE LOISIRS";
            break;
        case 'S9501':
            return "REPARATION D'ORDINATEURS ET D'EQUIPEMENTS DE COMMUNICATION";
            break;
        case 'S9502':
            return "REPARATION DE BIENS PERSONNELS ET DOMESTIQUES";
            break;
        case 'T9700':
            return "ACTIVITÉS DES MÉNAGES EN TANT QU’EMPLOYEURS DE PERSONNEL DOMESTIQUE";
            break;
        
        default:
            "";
            break;
    }
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


