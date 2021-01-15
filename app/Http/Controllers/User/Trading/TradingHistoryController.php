<?php

namespace App\Http\Controllers\User\Trading;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\WithdrawalFund;
use Illuminate\Http\Request;

class TradingHistoryController extends Controller
{
    public function main()
    {
        $orders = Order::all();
        $withdrawals = WithdrawalFund::all();
        return view('trading.history', compact('orders', 'withdrawals'));
    }
}
