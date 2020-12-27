<?php

namespace App\Http\Controllers\User\DepositAndWithDraw;

use App\Http\Controllers\Controller;
use App\Models\WithdrawalFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateWithdrawalFundsController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except("_token");
        $validate = $this->validateData($data);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $data['user_id'] = Auth::user()->id;
        WithdrawalFund::create($data);
        return redirect()->back()->with('success', 'You create withdrawal funds successfully!');
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
                'bank_account' => 'required|string|max:255',
                'bank_name' => 'required|string|max:255',
                'swift_code' => 'required|string|regex:/[A-Z0-9]{8,}/',
                'iban' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'balance' => 'bail|required|numeric|min:50',
                'withdrawal_currency' => 'required',
                'amount' => 'bail|required|numeric|min:50',
                'account_holder' => 'required|string|max:255',
                'bank_branch_name' =>  'required|string|max:255',
                'bank_address' =>  'required|string|max:255',
                'note' => 'required|string|max:255',
            ]
        );
    }
}
