<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function main(Request $request)
    {
        $data = $request->except(['_token']);
        $user = User::where('id', Auth::user()->id)->update($data);
        if ($user) {
            return redirect()->back()->with('success', 'You updated your info successfully');
        } else {
            return redirect()->back()->with('error', 'You updated your info fail');
        }
    }
}
