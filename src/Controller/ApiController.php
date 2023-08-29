<?php

namespace App\Controller;

use App\Entity\User;
use App\Helpers\Validation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $password_hasher, private ValidatorInterface $validator)
    {
    }

    #[Route("v1/register", name: "register", methods: ["POST"])]
    public function register(Request $request)
    {
        $data = $request->request->all();

        $user = new User();
        $user->setEmail($data['email']);

        $plaintextPassword = $data['password'];

        if ($data["password"] != "") {
            $password = $this->password_hasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($password);
        }

        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            $hasError = Validation::check($errors);

            if ($hasError != null) {
                return $this->json([
                    "errors" => $hasError,
                    "status_code" => Response::HTTP_UNPROCESSABLE_ENTITY,
                    "message" => Response::$statusTexts['422']
                ], 422);
            }
        }

        $this->em->persist($user);
        $this->em->flush();

        $data["user"] = $user;

        return $this->json(responseForm($data["user"], 200));
    }

    #[Route("api", name: "api")]
    public function me()
    {
        $data = $this->getUser();
        return $this->json(responseForm($data, 200));
    }
}
