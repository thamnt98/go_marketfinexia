<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helper\MT5Helper;

class ChangeMTPasswordController extends Controller
{

    /**
     * @var mT5Helper
     */
    private $mT5Helper;

    public function __construct(MT5Helper $mT5Helper)
    {
        $this->mT5Helper = $mT5Helper;
    }

    public function main(Request $request)
    {
        $data = $request->except(('_token'));
        $validate = $this->validateData($data);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        try {
            $result = $this->mT5Helper->changeMasterPassword($data);
            if ($result->MSG_USER == null) {
                return redirect()->back()->with('success', "You changed MT Password succesffully");
            } else {
                return redirect()->back()->with('error', "Change MT Password failed");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong. Please try again");
        }
    }

    private function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'login' => 'required',
                'password' => 'required|regex:/[A-z0-9]{8,}/',
                'password_confirmation' => 'required|same:password'
            ]
        );
    }
}
