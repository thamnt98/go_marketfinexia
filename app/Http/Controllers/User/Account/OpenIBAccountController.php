<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Mail\OpenLiveAccountSuccess;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;

class OpenIBAccountController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except('_token');
        $token = config('twilio.token');
        $twilio_sid =  config('twilio.sid');
        $twilio_verify_sid =  config('twilio.verify_sid');
        $twilio = new Client($twilio_sid, $token);
        if (Session::get('showForm') == 1) {
            $validatePhone = $this->validatePhone($data['phone']);
            if ($validatePhone->fails()) {
                return redirect()->back()->withErrors($validatePhone->errors())->withInput();
            }
            if ($data['phone'][0] == 0) {
                $data['phone'] = substr($data['phone'], 1);
            }
            $data['phone'] = '+' . $data['country_code'] . $data['phone'];
            try {
                $twilio->verify->v2->services($twilio_verify_sid)
                    ->verifications
                    ->create($data['phone'], "sms");
                Session::put([
                    'showForm' => 2,
                    'phone' => $data['phone']
                ]);
                Session::put('phone', $data['phone']);
                return redirect()->back()->with('success', 'Send OTP successfully');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Something went wrong while sending OTP. Please try again later');
            }
        }
        if (Session::get('showForm') == 2) {
            $validateOTP = $this->verifyOTP($data['otp']);
            if ($validateOTP->fails()) {
                return redirect()->back()->withErrors($validateOTP->errors())->withInput();
            }
            $phone = Session::get('phone');
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($data['otp'], array('to' => $phone));
            if ($verification->valid) {
                Session::put('showForm', 3);
                return redirect()->back();
            } else {
                $error = new MessageBag();
                $error->add('otp', 'OTP is invalid');
                return redirect()->back()->withErrors($error->getMessages());
            }
        }
        if (Session::get('showForm') == 3) {
            $isValid = $this->isValid($data);
            if ($isValid->fails()) {
                return redirect()->back()->withErrors($isValid->errors())->withInput();
            }
            $user = Auth::user();
            $data['name'] = $user->full_name;
            $data['phone'] = 'xxxxxx'. substr($user->phone_number, -4);
            $data['zipcode'] = $user->zip_code;
            $data['city'] = $user->city;
            $data['state'] = $user->state;
            $data['address'] = $user->address;
            $data['country'] = $user->country;
            $data['password'] = Str::random(7);
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
                    $account = LiveAccount::create($data);
                    Mail::to($user->email)->send(new OpenLiveAccountSuccess($user, $account, $data['password']));
                    return redirect()->back()->with('success', "Open live account successfully. Please check your inbox or spam to login into MetaTrader 4");
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', "Something went wrong. Please try again");
            }
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
                'otp' => 'required'
            ]
        );
    }
}
