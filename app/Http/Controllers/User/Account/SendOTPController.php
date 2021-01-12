<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Session;

class SendOTPController extends Controller
{
    public function main()
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        return view('account.otp', compact('liveAccounts'));
    }
}
