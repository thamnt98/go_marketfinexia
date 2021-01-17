<?php

namespace App\Http\Controllers\User\Trading;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\WithdrawalFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradingHistoryController extends Controller
{
    public function main()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->get();
        $withdrawals = WithdrawalFund::where('user_id', $id)->get();
        return view('trading.history', compact('orders', 'withdrawals'));
    }
}
