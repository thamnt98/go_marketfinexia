<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use  App\Mail\ForgotPassword;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;

class SendEmailForgotPasswordController extends Controller
{
    public function main(Request $request)
    {
        $email = $request->email;
        $isValid = $this->isValid(['email' => $email]);
        if($isValid->fails())
        {
        return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $token = $this->createToken($email);
        Mail::to($email)->send(new ForgotPassword($email, $token));
        return back()->with('success', "We have sent you an email to reset password. Please check your inbox or spam");
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'email' => 'bail|required|exists:users'
            ]
        );
    }

    private function createToken($email)
    {
        $key = config('app.key');
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        $token = hash_hmac('sha256', Str::random(40), $key);
        PasswordReset::updateOrCreate(
            ['email' => $email],
            [
                'token' => $token,
                'email' =>  $email,
                'created_at' => Carbon::now()
            ]
        );
        return $token;
    }
}
