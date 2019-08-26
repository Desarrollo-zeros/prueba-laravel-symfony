<?php

namespace App\Controller;

use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public function responseError($error)
    {
        return $this->json(
            [
                'status_code' => 500,
                'status'      => "error",
                'message'     => $error
            ],
            200
        );
    }

    public function responseSuccess($data)
    {
        return $this->json(
            [
                'status_code' => 200,
                'status'      => "success",
                'data'        => $data
            ],
           200
        );
    }


}