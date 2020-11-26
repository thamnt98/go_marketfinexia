<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithDrawFundsController extends Controller
{
    public function main()
    {
        return view('account.withdraw_funds');
    }
}
