<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LiveAccountController extends Controller
{
    public function main()
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        if (!Session::has('showForm')) {
            Session::put('showForm', 3);
        }
        return view('account.live', compact('liveAccounts'));
    }
}
