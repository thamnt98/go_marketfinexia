<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetBalanceByLoginController extends Controller
{
    public function main($login)
    {
        $fp = fsockopen(config('mt4.vps_ip'), config('mt4.vps_port'), $errno, $errstr, 6);
        $cmd = 'action=getaccountbalance&login=' . $login;
        fwrite($fp, $cmd);
        stream_set_timeout($fp, 1);
        $result = '';
        $info = stream_get_meta_data($fp);
        while (!$info['timed_out'] && !feof($fp)) {
            $str = @fgets($fp, 1024);
            if (strpos($str, 'login')) {
                $result .= $str;
                $info = stream_get_meta_data($fp);
            }
        }
        $result = explode('&', $result);
        $balance =  (int)(explode('=', $result[2])[1]);
        fclose($fp);
        return $balance;
    }
}
