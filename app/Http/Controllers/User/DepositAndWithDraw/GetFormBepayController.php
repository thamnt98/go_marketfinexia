<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

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
        $banks = $result->data;
        return view('withdrawanddeposit.bepay', compact('banks'));
    }
}
