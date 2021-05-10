<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Support\Facades\Auth;

class DepositFundsController extends Controller
{
    public function main()
    {
        $user = Auth::user();
        $logins = LiveAccount::where('user_id', $user->id);
        if(isset($search['login']) && !empty($search['login'])){
            $logins = $logins->where('login', $search['login']);
        }
        $logins = $logins->pluck('login')->toArray();
        $listAccounts = [];
        foreach($logins as $login){
            $listAccounts[$login] = $login;
        }
        return view('withdrawanddeposit.deposit_funds', compact('listAccounts'));
    }

}
