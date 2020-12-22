<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateWithdrawalFundsController extends Controller
{
    public function main(Request $request)
    {
        return redirect()->back();
        $data = $request->except("_token");
        $validate = $this->valdateData($data);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
    }

    private function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'login' => 'required',
                'currency' => 'required',
                'available_balance' => 'bail|required|numeric|min:50',
                'withdrawal_type' => 'required',
                'bank_account' => 'required',
                'bank_name',
                'swift_code',
                'iban',
                'account_name',
                'balance',
                'withdrawal_currency',
                'amount',
                'account_holder',
                'bank_branch_name',
                'bank_address',
                'note'
            ]
        );
    }
}
