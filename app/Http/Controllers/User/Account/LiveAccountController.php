<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tarikhagustia\LaravelMt5\Entities\User;
use Tarikhagustia\LaravelMt5\LaravelMt5;

class LiveAccountController extends Controller
{
    public function main()
    {
        $api = new LaravelMt5();
        $user = new User();
        $user->setName("John Due");
        $user->setEmail("john@due.com");
        $user->setGroup("demo\demoforex");
        $user->setLeverage("50");
        $user->setPhone("0856123456");
        $user->setAddress("Sukabumi");
        $user->setCity("Sukabumi");
        $user->setState("Jawa Barat");
        $user->setCountry("Indonesia");
        $user->setZipCode(1470);
        $user->setMainPassword("Secure123");
        $user->setInvestorPassword("NotSecure123");
        $user->setPhonePassword("NotSecure123");
        $result = $api->createUser($user);
    }
}
