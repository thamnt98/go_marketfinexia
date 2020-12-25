<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except('_token');
        $validate = $this->validateData($data);
        $user = Auth::user();
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $checkPassword = Hash::check($data['current_password'], $user->password);
        if (!$checkPassword) {
            return redirect()->back()->withErrors(['current_password' => 'Password is wrong']);
        }
        $user = User::where('id', $user->id)->update(['password' => Hash::make($data['new_password'])]);
        return redirect()->back()->with('success', 'You updated password successfully !');
    }

    public function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'current_password' => 'required|regex:/[A-z0-9]{8,}/',
                'new_password' => 'required|regex:/[A-z0-9]{8,}/',
                'password_confirmation' => ['required', 'same:new_password']
            ]
        );
    }
}
