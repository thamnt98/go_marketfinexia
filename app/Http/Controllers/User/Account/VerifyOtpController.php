<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class VerifyOtpController extends Controller
{
    public function main()
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        return view('account.verify_otp', compact('liveAccounts'));
    }


    public function verify(Request $request)
    {
        $validate =  Validator::make(
            $request->all(),
            [
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $token = config("app.TWILIO_AUTH_TOKEN");
        $twilio_sid = config("app.TWILIO_SID");
        $twilio_verify_sid = config("app.TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request['verification_code'], array('to' => $request['phone_number']));
        if ($verification->valid) {
            return redirect()->route('account.live')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $request['phone_number'], 'error' => 'Invalid verification code entered!']);
    }
}
