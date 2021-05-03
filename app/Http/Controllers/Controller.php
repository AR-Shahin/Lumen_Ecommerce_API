<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function returnResponse($msg,$data,$status = true,$code=200){
        return response()->json([
                'success' => $status,
                'message' => $msg,
                'data' => $data
        ],$code);
    }
}
