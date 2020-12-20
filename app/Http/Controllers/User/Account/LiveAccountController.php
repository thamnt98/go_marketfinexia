<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveAccountController extends Controller
{
    public function main()
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        return view('account.live', compact('liveAccounts'));
    }
}
