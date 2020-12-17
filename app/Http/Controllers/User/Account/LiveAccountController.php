<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveAccountController extends Controller
{
    public function main()
    {
// $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        // socket_connect($socket, "127.0.0.1", 8000);
        // $cmd = 'action=closeorder&order=8115832';
        // socket_write($socket, $cmd);
        // $a = "";
        // while ($out = socket_read($socket, 1024)) {
        //    $a = $a.$out;
        // }
        // $a=str_replace("\n","",$a);
        return view('account.live');
    }
}
