<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoAccountController extends Controller
{
    public function main()
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if(socket_connect($socket, config('mt4.vps_ip'), config('mt4.vps_port'))){
            $cmd = 'action=getloginsbygroup&group=demoCawada';
            socket_write($socket, $cmd);
        dd(socket_read($socket,2048));         
}
            // $a = "";
            // while(socket_read($socket, 2450))
            // {
            //     echo socket_read($socket, 2450);
            // }
        }
}
