<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function main()
    {
        return view('auth.passwords.email');
    }
}
