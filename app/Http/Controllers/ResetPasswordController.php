<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function main(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        return view('auth.passwords.reset', compact('email', 'token'));
    }
}
