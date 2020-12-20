<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

class OpenIBAccountController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except('_token');
        $isValid = $this->isValid($data);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $user = Auth::user();
        $data['name'] = $user->full_name;
        $data['email'] = $user->email;
        $data['phone'] = $user->phone_number;
        $data['zipcode'] = $user->zip_code;
        $data['city'] = $user->city;
        $data['state'] = $user->state;
        $data['address'] = $user->address;
        $data['country'] = $user->country;
        try {
            $cmd = 'action=createaccount&login=next';
            foreach ($data as $key => $value) {
                $cmd = $cmd . '&' . $key . '=' . $value;
            }
            $cmd = 'action=createaccount&login=next';
            foreach ($data as $key => $value) {
                $cmd = $cmd . '&' . $key . '=' . $value;
            }
            $fp = fsockopen(config('mt4.vps_ip'), config('mt4.vps_port'), $errno, $errstr, 6);
            if (!$fp) {
                return redirect()->back()->with('error', "Something went wrong. Please try again");
            } else {
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
                fclose($fp);
                $result = explode('&', $result);
                $data['login'] = explode('=', $result[1])[1];
                $data['user_id'] = $user->id;
                LiveAccount::create($data);
                return redirect()->back()->with('success', "Open live account successfully");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong. Please try again");
        }
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'group' => 'required',
                'leverage' => 'required'
            ]
        );
    }
}
