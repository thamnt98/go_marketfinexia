<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class SendOTPController extends Controller
{
    public function main()
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        return view('account.otp', compact('liveAccounts'));
    }

    public function send(Request $request)
    {
        $phone = $request->phone_number;
        $isValid = $this->isValid(['phone_number' => $phone]);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $token = config("app.TWILIO_AUTH_TOKEN");
        $twilio_sid = config("app.TWILIO_SID");
        $twilio_verify_sid = config("app.TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        try {
            $twilio = $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($phone, "sms");
        } catch (Exception $e) {
            $code = $e->getCode();
            dd($e->getMessage());
            switch ($code) {
                case 60200 :
                    $message = "Cannot find the phone number you just entered"; break;
                case 20429:
                    $message = "You send many requests. Please try again later"; break;
                case 60203 :
                    $message = " Max send attempts reached"; break;
                default :
                    $message = "Something went wrong. Please try again later"; break;
            }
            return redirect()->back()->with("error", $message);
        }
        return redirect('trader/otp/verify')->with('phone', $phone);
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'phone_number' => 'required|exists:users,phone_number|regex:/^\+\d{9,12}$/'
            ],
            [
                'phone_number.regex' => "The phone number must  include phone country code",
                'phone_number.exists' => "The phone number does not match your phone number in your profile"
            ]
        );
    }
}
