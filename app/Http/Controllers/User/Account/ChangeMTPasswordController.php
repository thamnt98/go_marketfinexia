<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangeMTPasswordController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except(('_token'));
        $validate = $this->validateData($data);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        try {
            $fp = fsockopen(config('mt4.vps_ip'), config('mt4.vps_port'), $errno, $errstr, 6);
            $cmd = 'action=changepassword&investor=0&login=' . $data['login'] . '&pass=' . $data['password'];
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
            $result = explode('=', $result[0])[1];
            fclose($fp);
            if ($result == 1) {
                return redirect()->back()->with('success', "You changed MT Password succesffully");
            } else {
                return redirect()->back()->with('error', "Change MT Password failed");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong. Please try again");
        }
    }

    private function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'login' => 'required',
                'password' => 'required|regex:/[A-z0-9]{8,}/',
                'password_confirmation' => 'required|same:password'
            ]
        );
    }
}
