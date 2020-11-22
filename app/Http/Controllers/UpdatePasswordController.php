<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->all();
        $validate = $this->validateData($data);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors());
        }
        $password = Hash::make($data['password']);
        User::where('email', $data['email'])
            ->update(['password' => $password]);
        return redirect()->route('login');
    }

    private function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'email' => 'required|email',
                'token' => 'required|string',
                'password' => 'required|regex:/[A-z0-9]{8,}/',
                'password_confirmation' => ['required', 'same:password']
            ]
        );
    }
}
