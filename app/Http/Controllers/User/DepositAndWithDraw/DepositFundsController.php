<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DepositFundsController extends Controller
{
    public function main()
    {
        $banks = [];
        $merchantId = config('bepay.merchant_id');
        $secretKey = config('bepay.secret_key');
        $sign = md5($merchantId . $secretKey);
        $endpoint = "https://bepay2.com/api/v2/payment/listBank?merchant_id=" . $merchantId . "&sign=" . $sign;
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        $banks = $result->data;
        return view('withdrawanddeposit.deposit_funds', compact('banks'));
    }
}
