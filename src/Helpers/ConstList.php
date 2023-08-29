<?php

namespace App\Helpers;

class ConstList
{

    const baseURL = "https://applicarte.abidjan.net";
    const baseApaymPro = "/servicesApay/Controllers/tbl_services.ctrl.php?task=registerBusiness";

    public static function generateEnrollUrl($params)
    {
        $enroll = self::baseURL . "/apaymEnroll/apaymEnrolementController.php?link=$params";
        return $enroll;
    }

    public static  function baseUrlApaymPro()
    {
        $enroll = self::baseURL.self::baseApaymPro;
        return $enroll;
    }
}
