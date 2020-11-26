<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout', function() {
    Auth::logout();
    return redirect('/login');
});
Auth::routes();
Route::post('/register', 'Auth\RegisterController@main')->name('register');
Route::get('/password/reset', 'ResetPasswordController@main')->name('password.reset');
Route::post('/password/reset', 'UpdatePasswordController@main')->name('password.update');
Route::group([
    'namespace' => 'User',
    'middleware' => 'auth',
    'prefix' => 'trader'
], function () {
    Route::get('', 'HomeController@main')->name('home');
    Route::group([
        'namespace' => 'Account'
    ], function () {
        Route::get('/open-trading-account', 'LiveAccountController@main')->name('account.live');
        // Route::get('/open-demo-account', 'DemoAccountController@main')->name('account.demo');
        Route::get('/open-ib-account/{type}', 'IBAccountController@main')->name('account.ib');
    });
    Route::group([
        'namespace' => 'DepositAndWithDraw'
    ], function () {
        Route::get('/deposit-funds', 'DepositFundsController@main')->name('deposit.funds');
        Route::get('/withdraw-funds', 'WithDrawFundsController@main')->name('withdraw.funds');
    });
});
