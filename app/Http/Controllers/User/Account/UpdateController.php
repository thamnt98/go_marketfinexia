<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except(['_token']);
        $isValid = $this->isValid($data);
        if ($isValid->fails()) {
            return redirect()->back()->withErrors($isValid->errors())->withInput();
        }
        $user = User::where('id', Auth::user()->id)->update($data);
        if ($user) {
            return redirect()->back()->with('success', 'You updated your info successfully');
        } else {
            return redirect()->back()->with('error', 'You updated your info fail');
        }
    }

    public function isValid($data)
    {
        return Validator::make(
            $data,
            [
                'phone_number' => 'required|regex:/^\+\d{9,12}$/'
            ],
            ['phone_number.regex' => "The phone number must  include phone country code, example +19172678536"]
        );
    }
}
