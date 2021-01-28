<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LiveAccountController extends Controller
{
    public function main(Request $request)
    {
        $liveAccounts = LiveAccount::where('user_id', Auth::user()->id)->get();
        $phone = $request->mobile_no;
        return view('account.live', compact('liveAccounts', 'phone'));
    }
}
