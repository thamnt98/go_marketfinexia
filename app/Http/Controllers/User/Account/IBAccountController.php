<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IBAccountController extends Controller
{
    public function main(Request $request)
    {
        $sideBar = $request->type;
        return view('account.ib', compact('sideBar'));
    }
}
