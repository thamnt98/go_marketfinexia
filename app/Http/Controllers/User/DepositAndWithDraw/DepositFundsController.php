<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositFundsController extends Controller
{
    public function main()
    {
        return view('withdrawanddeposit.deposit_funds');
    }
}