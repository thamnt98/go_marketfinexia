<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;

class SendOTPController extends Controller
{
    public function main()
    {
        $token = config('twilio.token');
        $twilio_sid =  config('twilio.sid');
        $twilio_verify_sid =  config('twilio.verify_sid');
        $twilio = new Client($twilio_sid, $token);
        try {
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create(Session::get('phone'), "sms");
            return redirect()->back()->with('success', 'Send OTP successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while sending OTP. Please try again later');
        }
    }
}
