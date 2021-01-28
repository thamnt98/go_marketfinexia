<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithDrawFundsController extends Controller
{
    public function main()
    {
        $logins = LiveAccount::where('user_id', Auth::user()->id)->pluck('login');
        return view('withdrawanddeposit.withdraw_funds', compact('logins'));
    }
}
