<?php

namespace App\Controller;

use App\Helpers\HttpGuzzle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MergeManageController extends AbstractController
{
    public function __construct(private HttpGuzzle $httpGuzzle)
    {
    }

    #[Route('/api/v1/merge-manage', name: 'app_merge_manage')]
    public function getData(Request $request): Response
    {
        $profilid =$request->query->get('profil_id');
        $res = $this->httpGuzzle->getMergeData($profilid);

        return $this->json($res);
    }
}
