<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Mail\OpenLiveAccountSuccess;
use App\Models\LiveAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class OpenIBAccountController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except('_token');
        $isValid = $this->isValid($data);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $phone = $request->phone;
        $user = Auth::user();
        $liveAccounts = LiveAccount::where('user_id', $user->id)->get();
        if(count($liveAccounts) >= 2){
            return redirect()->back()->with('error',
                "You opened two accounts and cant open anymore");
        }
        $data['name'] = $user->full_name;
        $data['phone'] = $phone[1] . $phone[2] . 'xxxxxx' . substr($phone, -4);
        $data['zipcode'] = $user->zip_code;
        $data['city'] = $user->city;
        $data['state'] = $user->state;
        $data['address'] = $user->address;
        $data['country'] = $user->country;
        $data['password'] = Str::random(7);
        $data['agent'] = $data['ib_id'];
        try {
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
                $data['phone_number'] = substr($phone, 1);
                $account = LiveAccount::create($data);
                Mail::to($user->email)->send(new OpenLiveAccountSuccess($user, $account, $data['password']));
                return redirect()->back()->with('success',
                    "Open live account successfully. Please check your inbox or spam to login into MetaTrader 4");
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Something went wrong. Please try again");
        }
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'group'    => 'required',
                'leverage' => 'required',
                'ib_id'    => 'required|regex:/[0-9]{6}/',
            ],
            [
                'ib_id.regex' => 'The IB ID has only 6 digits',
            ]
        );
    }

    public function validatePhone($phone)
    {
        return Validator::make(
            ['phone' => $phone],
            [
                'phone' => 'required|regex:/[0-9]{8}/',
            ]
        );
    }

    public function verifyOTP($otp)
    {
        return Validator::make(
            ['otp' => $otp],
            [
                'otp' => 'required',
            ]
        );
    }
}
