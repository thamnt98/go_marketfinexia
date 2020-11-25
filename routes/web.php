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

Route::get('/', function () {
    return view('layouts.simplepage');
})->middleware('auth')->name('home');
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
    Route::group([
        'namespace' => 'Account'
    ], function () {
        Route::get('/', 'LiveAccountController@main')->name('account.live');
    });
});
