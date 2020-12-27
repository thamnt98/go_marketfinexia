<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MTPasswordController extends Controller
{
    public function main()
    {
        $logins = LiveAccount::where('user_id', Auth::user()->id)->pluck('login');
        $data = [];
        if (count($logins)) {
            try {
                $fp = fsockopen(config('mt4.vps_ip'), config('mt4.vps_port'), $errno, $errstr, 6);
                foreach ($logins as $key => $login) {
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
                    $data[$login] = (int)(explode('=', $result[2])[1]);
                }
                fclose($fp);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', "Something went wrong. Please try again");
            }
        }
        return view('account.changepassword', compact('data'));
    }
}
