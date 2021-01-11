<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class DetailController extends Controller
{
    public function main()
    {
        $user = Auth::user();
        return view('account.detail', compact('user'));
    }
}
