<?php

namespace App\Controller;

use App\Helpers\HttpGuzzle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateApaymController extends AbstractController
{
    public function __construct(private HttpGuzzle $httpGuzzle)
    {
    }

    #[Route('/api/v1/create-apaym-pro', name: 'app_create_apaym_single', methods: ["POST"])]
    public function createApaymPro(Request $request)
    {
        $row = $request->request->all();
        $res = $this->httpGuzzle->createApaymPro($row, $key = null, $fileSaved = null);

        return $this->json($res);
    }
}