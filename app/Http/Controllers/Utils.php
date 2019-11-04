<?php


namespace App\Http\Controllers;


class Utils extends Controller
{
    static public function pack($data, $code = 0, $msg = '')
    {
        $package = array('code' => $code, 'msg' => $msg, 'data' => $data);
        return $package;
    }
}