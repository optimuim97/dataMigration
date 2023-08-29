<?php

namespace App\Controller;

use App\Helpers\HttpGuzzle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateApaympProController extends AbstractController
{
    public function __construct(private HttpGuzzle $httpGuzzle)
    {
    }

    #[Route('/api/v1/upate-apaym-pro', name: 'app_update_apaymp_pro')]
    public function update(Request $request): Response
    {
        $data = $request->request->all();
        $res = $this->httpGuzzle->updateApaymPro($data);

        return $this->json($res);
    }
}
