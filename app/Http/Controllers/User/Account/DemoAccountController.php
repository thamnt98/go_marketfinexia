<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoAccountController extends Controller
{
    public function main()
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, "199.188.206.67", 8000);
        $cmd = 'action=closeorder&order=8115832';
        socket_write($socket, $cmd);
        $a = "";
        while ($out = socket_read($socket, 1024)) {
           $a = $a.$out;
        }
        $a=str_replace("\n","",$a);
        dd($a);
    }
}
