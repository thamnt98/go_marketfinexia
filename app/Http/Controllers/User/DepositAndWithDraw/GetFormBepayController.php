<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use GuzzleHttp\Client;
use App\Repositories\LiveAccountRepository;
use Illuminate\Support\Facades\Auth;

class GetFormBepayController extends Controller
{
    public function main()
    {
        $banks = [];
        $merchantId = config('deposit.bepay.merchant_id');
        $secretKey = config('deposit.bepay.secret_key');
        $sign = md5($merchantId . $secretKey);
        $endpoint = "https://bepay2.com/api/v2/payment/listBank?merchant_id=" . $merchantId . "&sign=" . $sign;
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        $banks_results = $result->data;
        $banks = [];
        $count = 0;
        foreach($banks_results as $b){
            $count++;
            if($count > 12){
                break;
            }
            $banks[] = $b;
        }
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
        return view('withdrawanddeposit.bepay', compact('banks', 'listAccounts'));
    }
}
