<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class BepayTransferController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except("_token");
        $isValid = $this->isValid($data);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['status'] = 2;
        $data['merchant_id'] = config('bepay.merchant_id');
        $data['payment_method'] = 1;
        $data['merchant_txn'] = $data['order_number'] = Str::random(6);
        $data['merchant_customer'] = $user->first_name . '_' . $user->last_name;
        $data['ur_success'] = route('deposit.bepay');
        $data['sign'] = md5($data['merchant_id'] . $data['merchant_txn'] . $data['merchant_customer'] . $data['amount_money'] . $data['bank_code'] .  config('bepay.secret_key'));
        $data['amount'] = $data['amount_money'];
        Order::create($data);
        $endpoint = "https://bepay2.com/api/v2/payment/request";
        $client = new Client();
        $response = $client->post($endpoint, array(
            'form_params' => $data
        ));
        $result = json_decode($response->getBody());
        if(isset($result->data->redirect_url) && $result->data->redirect_url){
            return Redirect::to($result->data->redirect_url);
        }
        return redirect()->back()->withInput();
    }

    private function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'amount_money' => 'required|min:150000|numeric',
                'bank_code' => 'required'
            ]
        );
    }
}
