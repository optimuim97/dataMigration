<?php

namespace App\Helpers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Validation  extends AbstractController{
    
    public static function check($errors){
        if (count($errors) > 0) {

            $composeError = [];

            foreach ($errors as $error) {
                $composeError [$error->getPropertyPath()] = $error->getMessage();
            }

           return $composeError;
           
        }else{

            return null;

        }
    }

}