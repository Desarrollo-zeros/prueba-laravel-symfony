<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseError($error)
    {
        return response()->json(
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
        return response()->json(
            [
                'status_code' => 200,
                'status'      => "success",
                'data'        => $data
            ],
            200
        );
    }

}
