<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use App\Models\Order;
use App\Models\WithdrawalFund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function main()
    {
        $userId = Auth::user()->id;
        $fp = fsockopen(config('mt4.vps_ip'), config('mt4.vps_port'), $errno, $errstr, 6);
        $logins = LiveAccount::where('user_id', $userId)->pluck('login');
        $balances = [];
//        foreach ($logins as $login) {
//            $cmd = 'action=getaccountbalance&login=' . $login;
//            fwrite($fp, $cmd);
//            stream_set_timeout($fp, 1);
//            $result = '';
//            $info = stream_get_meta_data($fp);
//            while (!$info['timed_out'] && !feof($fp)) {
//                $str = @fgets($fp, 1024);
//                if (strpos($str, 'login')) {
//                    $result .= $str;
//                    $info = stream_get_meta_data($fp);
//                }
//            }
//            $result = explode('&', $result);
//            $balance = (int)(explode('=', $result[2])[1]);
//            $balances[$login] = $balance;
//        }
//        fclose($fp);
        $fromDate = date('Y-m-d', strtotime(date('Y-m-d') . "-30 days"));
        $orders = Order::where('user_id', $userId)
            ->where('status', config('deposit.status.yes'))
            ->whereBetween('created_at', [$fromDate, now()]);
        $orderTotal = $orders->sum('amount_money');
        $orders = $orders->groupBy('type')
            ->selectRaw('sum(amount_money) as total,type')
            ->get();
        $withdrawals = WithdrawalFund::where('user_id', $userId)
            ->where('status', config('deposit.status.yes'))
            ->whereBetween('created_at', [$fromDate, now()]);
        $withdrawalTotal = $withdrawals->sum('amount');
        $withdrawals = $withdrawals->groupBy('login')
            ->selectRaw('sum(amount) as total,login')
            ->get();
        return view('home', compact(['balances', 'orders', 'withdrawals', 'orderTotal', 'withdrawalTotal']));
    }
}
