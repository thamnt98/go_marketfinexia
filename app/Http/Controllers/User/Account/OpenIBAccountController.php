<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\LiveAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

class OpenIBAccountController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except('_token');
        $isValid = $this->isValid($data);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $user = Auth::user();
        $data['name'] = $user->full_name;
        $data['email'] = $user->email;
        $data['phone'] = $user->phone_number;
        $data['zipcode'] = $user->zip_code;
        $data['city'] = $user->city;
        $data['state'] = $user->state;
        $data['address'] = $user->address;
        $data['country'] = $user->country;
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        try {
            if (socket_connect($socket, config('mt4.vps_ip'), config('mt4.vps_port'))) {
                $cmd = 'action=createaccount&login=next';
                foreach ($data as $key => $value) {
                    $cmd = $cmd . '&' . $key . '=' . $value;
                }
                socket_write($socket, $cmd);
                return redirect()->back()->with('success', "Open account successfully");
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('error', "Something went wrong. Please try again");
        }
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'group' => 'required',
                'leverage' => 'required'
            ]
        );
    }
}
