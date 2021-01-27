<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function main(Request $request)
    {
        $ibId = $request->ib_id;
        return view('auth.register', compact('ibId'));
    }
}
