<?php

namespace App\Helpers;

use App\Entity\LoopLog;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Filesystem\Filesystem;


class HttpGuzzle
{
    public function __construct(private HttpClientInterface $client, private EntityManagerInterface $em, private ValidatorInterface $validator)
    {
    }

    public function createApaymPro($postedData, $key = null, $file = null)
    {
        $client = new Client();
        $url = "https://apaytest.weblogy.net/apaymEnroll/apaymEnrolementController.php";

        $data['op'] = "unitec";
        $data['codeagent'] = "";
        $data['nom'] = $postedData["usr_lastname"] ?? "";
        $data['prenom'] = $postedData["usr_firstname"] ?? "";
        $data['indice'] = "225";
        $data['numcel'] = $postedData["usr_phone"];
        $data['password'] = $password ?? "";
        $data['email'] = $postedData["usr_email"] ?? "";
        $data['paysResidence'] = $postedData["usr_country_residence"] ?? "";
        $data['villeResidence'] = $postedData["usr_town"] ?? "";
        $data['paysNaissance'] = $postedData["usr_nationality"] ?? "";
        $data['nationalite'] = $postedData["usr_nationality"] ?? "";
        $data['civilite'] = $postedData["usr_civilite"] ?? "Monsieur";
        $data['adresse'] = $postedData["usr_address"] ?? "";
        $data['date_naissance'] = $postedData["usr_birthday"] ?? "";
        $data['profession'] = $postedData["usr_profession"] ?? "";

        $data['img_recto'] = $postedData["usr_cni_file_rec"] ?? "";
        $data['img_verso'] = $postedData["usr_cni_file_ver"] ?? "";
        $data['photo'] = $postedData["usr_profil_url"] ?? "";
        $data['signature'] = $postedData["usr_signature"] ?? "";
        $data['dateEmission'] = $postedData["usr_date_emission"] ?? "";
        $data['dateExpiration'] = $postedData["usr_expiration_date"] ?? "";
        // $data['typePiece'] = $postedData["usr_type_piece"] ?? "";
        $data['typePiece'] = 1;
        $data['numPiece'] = $postedData["usr_piece_number"] ?? "";

        $data['mrch_business_name'] = $postedData["mrch_business_name"] ?? "";
        $data['mrch_business_abbr'] = $postedData["mrch_business_abbr"] ?? "";
        $data['mrch_city'] = $postedData["mrch_city"] ?? "";
        $data['mrch_merchent_logo_url'] = $postedData["mrch_merchent_logo_url"] ?? "";
        $data['mrch_business_description'] = $postedData["mrch_business_description"] ?? "";
        $data['mrch_business_start'] = $postedData["mrch_business_start"] ?? "";
        $data['mrch_town'] = $postedData["mrch_town"] ?? "";
        $data['mrch_business_phone_number'] = $postedData["mrch_business_phone_number"] ?? "";
        $data['mrch_business_address'] = $postedData["mrch_business_address"] ?? "";

        $data['mrch_gps'] = $postedData["mrch_gps"] ?? "";
        $data['mrch_rccm'] = $postedData["mrch_rccm"] ?? "";
        $data['mrch_dfe'] = $postedData["mrch_dfe"] ?? "";
        $data['mrch_number_fnce'] = $postedData["mrch_number_fnce"] ?? "";
        $data['mrch_business_email'] = $postedData["mrch_business_email"] ?? "";
        $data['mrch_exterior_photo'] = $postedData["mrch_exterior_photo"] ?? "";
        $data['mrch_interior_photo'] = $postedData["mrch_interior_photo"] ?? "";
        $data['mrch_local_type'] = $postedData["mrch_local_type"] ?? "";
        $data['mrch_business_size'] = $postedData["mrch_business_size"] ?? "";
        $data['mrch_nb_transcation_average_by_month'] = $postedData["mrch_nb_transcation_average_by_month"] ?? "";
        $data['mrch_transcation_volume_by_month'] = $postedData["mrch_transcation_volume_by_month"] ?? "";
        $data['mrch_chiff_aff_by_month'] = $postedData["mrch_chiff_aff_by_month"] ?? "";
        $data['mrch_number_client_by_day'] = $postedData["mrch_number_client_by_day"] ?? "";
        $data['mrch_bank'] = $postedData["mrch_bank"] ?? "";
        $data['mrch_ci_pme'] = $postedData["mrch_ci_pme"] ?? "";
        $data['mrch_chiffre_aff'] = $postedData["mrch_chiffre_aff"] ?? "";
        $data['mrch_employee_number'] = $postedData["mrch_employee_number"] ?? "";
        $data['mrch_business_chiffre_aff_ecoule'] = $postedData["mrch_business_chiffre_aff_ecoule"] ?? "";
        $data['mrch_indice_surcursale_etranger'] = $postedData["mrch_indice_surcursale_etranger"] ?? "";
        $data['mrch_has_public_personality'] = $postedData["mrch_has_public_personality"] ?? "";
        $data['mrch_schedule_start'] = $postedData["mrch_schedule_start"] ?? "";
        $data['mrch_number_sales_points'] = $postedData["mrch_number_sales_points"] ?? "";
        $data['mrch_owner_type_piece'] = $postedData["mrch_owner_type_piece"] ?? "";
        $data['mrch_business_sector'] = $postedData["mrch_business_sector"] ?? "";
        $data['mrch_country'] = $postedData["mrch_country"] ?? "";
        $data['mrch_number_indice'] = $postedData["mrch_number_indice"] ?? "";

        $password = Utils::quickRandom();

        $response = $client->post($url, [
            'query' => [
                'link' => 'createNewUserAndCard'
            ],
            'multipart' => [
                [
                    'name' => 'codeagent',
                    'contents' => $data['codeagent']
                ],
                [
                    'name' => 'nom',
                    'contents' => $data['nom']
                ],
                [
                    'name' => 'prenom',
                    'contents' => $data['prenom']
                ],
                [
                    'name' => 'indice',
                    'contents' => $data['indice']
                ],
                [
                    'name' => 'numcel',
                    'contents' => $data['numcel']
                ],
                [
                    'name' => 'password',
                    'contents' => $data['password']
                ],
                [
                    'name' => 'email',
                    'contents' => $data['email']
                ],
                [
                    'name' => 'paysResidence',
                    'contents' => $data['paysResidence']
                ],
                [
                    'name' => 'villeResidence',
                    'contents' => $data['villeResidence']
                ],
                [
                    'name' => 'paysNaissance',
                    'contents' => $data['paysNaissance']
                ],
                [
                    'name' => 'nationalite',
                    'contents' => $data['nationalite']
                ],
                [
                    'name' => 'civilite',
                    'contents' => $data['civilite']
                ],
                [
                    'name' => 'adresse',
                    'contents' => $data['adresse']
                ],
                [
                    'name' => 'date_naissance',
                    'contents' => $data['date_naissance']
                ],
                [
                    'name' => 'profession',
                    'contents' => $data['profession']
                ],
                [
                    'name' => 'op',
                    'contents' => $data['op']
                ],
                [
                    'name' => 'img_recto',
                    'contents' => $data['img_recto']
                ],
                [
                    'name' => 'img_verso',
                    'contents' => $data['img_verso']
                ],
                [
                    'name' => 'photo',
                    'contents' => $data['photo']
                ],
                [
                    'name' => 'signature',
                    'contents' => $data['signature']
                ],
                [
                    'name' => 'dateEmission',
                    'contents' => $data['dateEmission']
                ],
                [
                    'name' => 'dateExpiration',
                    'contents' => $data['dateExpiration']
                ],
                [
                    'name' => 'typePiece',
                    'contents' => $data['typePiece']
                ],
                [
                    'name' => 'numPiece',
                    'contents' => $data['numPiece']
                ],
                [
                    'name' => 'mrch_civility',
                    'contents' => $data['mrch_civility'] ?? ""
                ],
                [
                    'name' => 'mrch_business_name',
                    'contents' => $data['mrch_business_name']
                ],
                [
                    'name' => 'mrch_business_abbr',
                    'contents' => $data['mrch_business_abbr']
                ],
                [
                    'name' => 'mrch_city',
                    'contents' => $data['mrch_city']
                ],
                [
                    'name' => 'mrch_merchent_logo_url',
                    'contents' => $data['mrch_merchent_logo_url']
                ],
                [
                    'name' => 'mrch_business_description',
                    'contents' => $data['mrch_business_description']
                ],
                [
                    'name' => 'mrch_business_start',
                    'contents' => $data['mrch_business_start']
                ],
                [
                    'name' => 'mrch_town',
                    'contents' => $data['mrch_town']
                ],
                [
                    'name' => 'mrch_business_phone_number',
                    'contents' => $data['mrch_business_phone_number']
                ],
                [
                    'name' => 'mrch_gps',
                    'contents' => $data['mrch_gps']
                ],
                [
                    'name' => 'mrch_rccm',
                    'contents' => $data['mrch_rccm']
                ],
                [
                    'name' => 'mrch_dfe',
                    'contents' => $data['mrch_dfe']
                ],
                [
                    'name' => 'mrch_number_fnce',
                    'contents' => $data['mrch_number_fnce']
                ],
                [
                    'name' => 'mrch_business_email',
                    'contents' => $data['mrch_business_email']
                ],
                [
                    'name' => 'mrch_exterior_photo',
                    'contents' => $data['mrch_exterior_photo']
                ],
                [
                    'name' => 'mrch_interior_photo',
                    'contents' => $data['mrch_interior_photo']
                ],
                [
                    'name' => 'mrch_local_type',
                    'contents' => $data['mrch_local_type']
                ],
                [
                    'name' => 'mrch_business_size',
                    'contents' => $data['mrch_business_size']
                ],
                [
                    'name' => 'mrch_nb_transcation_average_by_month',
                    'contents' => $data['mrch_nb_transcation_average_by_month']
                ],
                [
                    'name' => 'mrch_nb_transcation_average_by_month',
                    'contents' => $data['mrch_nb_transcation_average_by_month']
                ],
                [
                    'name' => 'mrch_transcation_volume_by_month',
                    'contents' => $data['mrch_transcation_volume_by_month']
                ],
                [
                    'name' => 'mrch_chiff_aff_by_month',
                    'contents' => $data['mrch_chiff_aff_by_month']
                ],
                [
                    'name' => 'mrch_number_client_by_day',
                    'contents' => $data['mrch_number_client_by_day']
                ],
                [
                    'name' => 'mrch_bank',
                    'contents' => $data['mrch_bank']
                ],
                [
                    'name' => 'mrch_ci_pme',
                    'contents' => $data['mrch_ci_pme']
                ],
                [
                    'name' => 'mrch_chiffre_aff',
                    'contents' => $data['mrch_chiffre_aff']
                ],
                [
                    'name' => 'mrch_employee_number',
                    'contents' => $data['mrch_employee_number']
                ],
                [
                    'name' => 'mrch_business_chiffre_aff_ecoule',
                    'contents' => $data['mrch_business_chiffre_aff_ecoule']
                ],
                [
                    'name' => 'mrch_has_public_personality',
                    'contents' => $data['mrch_has_public_personality']
                ],
                [
                    'name' => 'mrch_schedule_start',
                    'contents' => $data['mrch_schedule_start']
                ],
                [
                    'name' => 'mrch_number_sales_points',
                    'contents' => $data['mrch_number_sales_points']
                ],
                [
                    'name' => 'mrch_owner_type_piece',
                    'contents' => $data['mrch_owner_type_piece']
                ],
                [
                    'name' => 'mrch_business_sector',
                    'contents' => $data['mrch_business_sector']
                ],
                [
                    'name' => 'mrch_country',
                    'contents' => $data['mrch_country']
                ],
                [
                    'name' => 'mrch_number_indice',
                    'contents' => $data['mrch_number_indice']
                ]
            ]
        ]);

        $res = json_decode($response->getBody()->getContents(), true);
        $filesystem = new Filesystem();

        if ($file == null) {
            $namefile = 'numero' . $data['indice'] . $data['numcel'];
            $filesystem->dumpFile("$namefile.txt",  print_r($res, TRUE));
        } else {
            $time = new \DateTime();
            $date = $time->format("Y-m-d");
            $filesystem->appendToFile("$date.txt", print_r($res, TRUE));
        }

        if ($response->getStatusCode() == 200) {
            if (isset($res["Apaym"])) {
                if ($res["Apaym"]["codeMsg"] == 1 && $res["Apaym"]["descMessage"] == "Succès") {

                    $exception = (new LoopLog);
                    $exception
                        ->setStatusCode("1")
                        ->setMessage($res["Apaym"]["codeMsg"])
                        ->setPosition($key ?? "success")
                        ->setProfilID($res["Apaym"]["profilID"])
                        ->setIsLoopError(true)
                        ->setLogDescription($res["Apaym"]['descMessage'])
                        ->setIsSuccess(true)
                        ->setFile($file)
                        ->setMetaData(json_encode($res));

                    $error = (new Session())->get('success_apaym_count') + 1;
                    (new Session())->set('success_apaym_count', $error);

                    if (isset($res['ApaymPro'])) {
                        if ($res['ApaymPro']['responseCode'] == 1) {
                            $errorPro = (new Session())->get('success_apaym_pro_count') + 1;
                            (new Session())->set('success_apaym_pro_count', $errorPro);
                        }
                    } elseif (isset($res['ApaymProTemp'])) {
                        if ($res['ApaymProTemp']['responseCode'] == 1) {
                            $errorPro = (new Session())->get('apaym_pro_temp_count') + 1;
                            (new Session())->set('apaym_pro_temp_count', $errorPro);
                        }
                    }

                    $this->em->persist($exception);
                    $this->em->flush();

                    // unset($res['op']);
                    return $res;
                } elseif ($res["Apaym"]["codeMsg"] == 4 && $res["Apaym"]['descMessage'] == "Existe déjà") {

                    $error = (new Session())->get('existing_count') + 1;
                    (new Session())->set('existing_count', $error);

                    $exception = (new LoopLog);
                    $exception
                        ->setStatusCode("4")
                        ->setMessage($res["Apaym"]['descMessage'])
                        ->setPosition($key ?? "single")
                        ->setProfilID($res["Apaym"]["profilID"])
                        ->setIsLoopError(true)
                        ->setLogDescription($res["Apaym"]['descMessage'])
                        ->setIsLoopError(true)
                        ->setFile($file)
                        ->setMetaData($res ? json_encode($res) : '');

                    $this->em->persist($exception);
                    $this->em->flush();

                    if (isset($res['ApaymPro'])) {
                        if ($res['ApaymPro']['responseCode'] == 1) {
                            $errorPro = (new Session())->get('success_apaym_pro_count') + 1;
                            (new Session())->set('success_apaym_pro_count', $errorPro);
                        }
                    } elseif (isset($res['ApaymProTemp'])) {
                        if ($res['ApaymProTemp']['responseCode'] == 1) {
                            $errorPro = (new Session())->get('apaym_pro_temp_count') + 1;
                            (new Session())->set('apaym_pro_temp_count', $errorPro);
                        }
                    } elseif (isset($res['Piece'])) {
                        if ($res['ApaymProTemp']['responseCode'] == -1) {
                            $errorPro = (new Session())->get('error_apaym_pro_temp_count') + 1;
                            (new Session())->set('error_apaym_pro_temp_count', $errorPro);
                        }
                    }

                    // unset($res['op']);
                    return $res;
                }
            } else {
                $exception = (new LoopLog);
                $exception
                    ->setStatusCode("501")
                    ->setMessage(Response::HTTP_UNPROCESSABLE_ENTITY)
                    ->setPosition($key ?? "single")
                    ->setIsLoopError(true)
                    ->setLogDescription(json_encode($res["Apaym"]["codeMsg"] ?? "empty single"))
                    ->setIsLoopError(true)
                    ->setFile($file ?? null)
                    ->setMetaData($res ? json_encode($res) : "");

                $this->em->persist($exception);
                $this->em->flush();
                return null;
            }
        } elseif ($response->getStatusCode() == 500) {

            $exception = (new LoopLog);
            $exception
                ->setStatusCode("500")
                ->setMessage(Response::HTTP_INTERNAL_SERVER_ERROR)
                ->setPosition($key)
                ->setIsLoopError(true)
                ->setLogDescription(json_encode($res["codeMsg"] ?? "empty"))
                ->setIsLoopError(true)
                ->setFile($file)
                ->setMetaData($res ? json_encode($res) : "");

            $this->em->persist($exception);
            $this->em->flush();

            $error = (new Session())->get('error_count') + 1;
            (new Session())->set('error_count', $error);

            return null;
        } elseif ($response->getStatusCode() == 422) {

            $exception = (new LoopLog);
            $exception
                ->setStatusCode("422")
                ->setMessage(Response::HTTP_UNPROCESSABLE_ENTITY)
                ->setPosition($key)
                ->setIsLoopError(true)
                ->setLogDescription(json_encode($res["codeMsg"] ?? "empty"))
                ->setIsLoopError(true)
                ->setFile($file)
                ->setMetaData($res ? json_encode($res) : "");

            $this->em->persist($exception);
            $this->em->flush();

            $error = (new Session())->get('error_count') + 1;
            (new Session())->set('error_count', $error);
            return null;
        } elseif ($response->getStatusCode() == 401 || $response->getStatusCode() == 403) {

            $exception = (new LoopLog);
            $exception
                ->setStatusCode("401")
                ->setMessage(Response::HTTP_UNAUTHORIZED)
                ->setPosition($key)
                ->setIsLoopError(true)
                ->setLogDescription("")
                ->setIsLoopError(true)
                ->setFile($file)
                ->setMetaData($res ? json_encode($res) : "");

            $this->em->persist($exception);
            $this->em->flush();

            $error = (new Session())->get('error_count') + 1;
            (new Session())->set('error_count', $error);
            return null;
        }
    }

    public function updateApaymPro($postedData)
    {
        $client = new Client();
        $url = "https://apaytest.weblogy.net/servicesApay/Controllers/tbl_services.ctrl.php";
        $data['profil_id'] = $postedData["profil_id"] ?? "";
        $data['mrch_business_name'] = $postedData["mrch_business_name"] ?? "";
        $data['mrch_business_abbr'] = $postedData["mrch_business_abbr"] ?? "";
        $data['mrch_city'] = $postedData["mrch_city"] ?? "";
        $data['mrch_merchent_logo_url'] = $postedData["mrch_merchent_logo_url"] ?? "";
        $data['mrch_business_description'] = $postedData["mrch_business_description"] ?? "";
        $data['mrch_business_start'] = $postedData["mrch_business_start"] ?? "";
        $data['mrch_town'] = $postedData["mrch_town"] ?? "";
        $data['mrch_business_phone_number'] = $postedData["mrch_business_phone_number"] ?? "";
        $data['mrch_business_address'] = $postedData["mrch_business_address"] ?? "";

        $data['mrch_gps'] = $postedData["mrch_gps"] ?? "";
        $data['mrch_rccm'] = $postedData["mrch_rccm"] ?? "";
        $data['mrch_dfe'] = $postedData["mrch_dfe"] ?? "";
        $data['mrch_number_fnce'] = $postedData["mrch_number_fnce"] ?? "";
        $data['mrch_business_email'] = $postedData["mrch_business_email"] ?? "";
        $data['mrch_exterior_photo'] = $postedData["mrch_exterior_photo"] ?? "";
        $data['mrch_interior_photo'] = $postedData["mrch_interior_photo"] ?? "";
        $data['mrch_local_type'] = $postedData["mrch_local_type"] ?? "";
        $data['mrch_business_size'] = $postedData["mrch_business_size"] ?? "";
        $data['mrch_nb_transcation_average_by_month'] = $postedData["mrch_nb_transcation_average_by_month"] ?? "";
        $data['mrch_transcation_volume_by_month'] = $postedData["mrch_transcation_volume_by_month"] ?? "";
        $data['mrch_chiff_aff_by_month'] = $postedData["mrch_chiff_aff_by_month"] ?? "";
        $data['mrch_number_client_by_day'] = $postedData["mrch_number_client_by_day"] ?? "";
        $data['mrch_bank'] = $postedData["mrch_bank"];
        $data['mrch_ci_pme'] = $postedData["mrch_ci_pme"];
        $data['mrch_chiffre_aff'] = $postedData["mrch_chiffre_aff"] ?? "";
        $data['mrch_employee_number'] = $postedData["mrch_employee_number"] ?? "";
        $data['mrch_business_chiffre_aff_ecoule'] = $postedData["mrch_business_chiffre_aff_ecoule"] ?? "";
        $data['mrch_indice_surcursale_etranger'] = $postedData["mrch_indice_surcursale_etranger"] ?? "";
        $data['mrch_has_public_personality'] = $postedData["mrch_has_public_personality"] ?? "";
        $data['mrch_schedule_start'] = $postedData["mrch_schedule_start"] ?? "";
        $data['mrch_number_sales_points'] = $postedData["mrch_number_sales_points"] ?? "";
        $data['mrch_owner_type_piece'] = $postedData["mrch_owner_type_piece"] ?? "";
        $data['mrch_business_sector'] = $postedData["mrch_business_sector"] ?? "";
        $data['mrch_juridic_formula'] = $postedData["mrch_juridic_formula"] ?? "";
        $data['mrch_country'] = $postedData["mrch_country"] ?? "";
        $data['mrch_number_indice'] = $postedData["mrch_number_indice"] ?? "";
        $data['mrch_business_indice'] = $postedData["mrch_business_indice"] ?? "";

        // $password = Utils::quickRandom();

        try {
            $response = $client->post($url, [
                'query' => [
                    'task' => 'updateMerchant'
                ],
                'multipart' => [
                    [
                        'name' => 'profil_id',
                        'contents' => $data['profil_id'] ?? ""
                    ],
                    [
                        'name' => 'mrch_civility',
                        'contents' => $data['mrch_civility'] ?? ""
                    ],
                    [
                        'name' => 'mrch_business_name',
                        'contents' => $data['mrch_business_name']
                    ],
                    [
                        'name' => 'mrch_business_abbr',
                        'contents' => $data['mrch_business_abbr']
                    ],
                    [
                        'name' => 'mrch_city',
                        'contents' => $data['mrch_city']
                    ],
                    [
                        'name' => 'mrch_merchent_logo_url',
                        'contents' => $data['mrch_merchent_logo_url']
                    ],
                    [
                        'name' => 'mrch_business_description',
                        'contents' => $data['mrch_business_description']
                    ],
                    [
                        'name' => 'mrch_business_start',
                        'contents' => $data['mrch_business_start']
                    ],
                    [
                        'name' => 'mrch_town',
                        'contents' => $data['mrch_town']
                    ],
                    [
                        'name' => 'mrch_business_phone_number',
                        'contents' => $data['mrch_business_phone_number']
                    ],
                    [
                        'name' => 'mrch_gps',
                        'contents' => $data['mrch_gps']
                    ],
                    [
                        'name' => 'mrch_rccm',
                        'contents' => $data['mrch_rccm']
                    ],
                    [
                        'name' => 'mrch_dfe',
                        'contents' => $data['mrch_dfe']
                    ],
                    [
                        'name' => 'mrch_number_fnce',
                        'contents' => $data['mrch_number_fnce']
                    ],
                    [
                        'name' => 'mrch_business_email',
                        'contents' => $data['mrch_business_email']
                    ],
                    [
                        'name' => 'mrch_exterior_photo',
                        'contents' => $data['mrch_exterior_photo']
                    ],
                    [
                        'name' => 'mrch_interior_photo',
                        'contents' => $data['mrch_interior_photo']
                    ],
                    [
                        'name' => 'mrch_local_type',
                        'contents' => $data['mrch_local_type']
                    ],
                    [
                        'name' => 'mrch_business_size',
                        'contents' => $data['mrch_business_size']
                    ],
                    [
                        'name' => 'mrch_nb_transcation_average_by_month',
                        'contents' => $data['mrch_nb_transcation_average_by_month']
                    ],
                    [
                        'name' => 'mrch_nb_transcation_average_by_month',
                        'contents' => $data['mrch_nb_transcation_average_by_month']
                    ],
                    [
                        'name' => 'mrch_transcation_volume_by_month',
                        'contents' => $data['mrch_transcation_volume_by_month']
                    ],
                    [
                        'name' => 'mrch_chiff_aff_by_month',
                        'contents' => $data['mrch_chiff_aff_by_month']
                    ],
                    [
                        'name' => 'mrch_number_client_by_day',
                        'contents' => $data['mrch_number_client_by_day']
                    ],
                    [
                        'name' => 'mrch_bank',
                        'contents' => $data['mrch_bank']
                    ],
                    [
                        'name' => 'mrch_ci_pme',
                        'contents' => $data['mrch_ci_pme']
                    ],
                    [
                        'name' => 'mrch_chiffre_aff',
                        'contents' => $data['mrch_chiffre_aff']
                    ],
                    [
                        'name' => 'mrch_employee_number',
                        'contents' => $data['mrch_employee_number']
                    ],
                    [
                        'name' => 'mrch_business_chiffre_aff_ecoule',
                        'contents' => $data['mrch_business_chiffre_aff_ecoule']
                    ],
                    [
                        'name' => 'mrch_has_public_personality',
                        'contents' => $data['mrch_has_public_personality']
                    ],
                    [
                        'name' => 'mrch_schedule_start',
                        'contents' => $data['mrch_schedule_start']
                    ],
                    [
                        'name' => 'mrch_number_sales_points',
                        'contents' => $data['mrch_number_sales_points']
                    ],
                    [
                        'name' => 'mrch_owner_type_piece',
                        'contents' => $data['mrch_owner_type_piece']
                    ],
                    [
                        'name' => 'mrch_business_sector',
                        'contents' => $data['mrch_business_sector']
                    ],
                    [
                        'name' => 'mrch_juridic_formula',
                        'contents' => $data['mrch_juridic_formula']
                    ],
                    [
                        'name' => 'mrch_country',
                        'contents' => $data['mrch_country']
                    ],
                    [
                        'name' => 'mrch_number_indice',
                        'contents' => $data['mrch_number_indice']
                    ],
                    [
                        'name' => 'mrch_business_indice',
                        'contents' => $data['mrch_business_indice']
                    ]
                ]
            ]);
        } catch (Exception $e) {
            return responseForm($e, $e->getCode(), $e->getMessage());
        }

        $res = json_decode($response->getBody()->getContents(), true);
        return $res;
    }
}
