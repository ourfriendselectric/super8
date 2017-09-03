<?php

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

use App\Order;
use App\Mail\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('home');
});

Route::get('/terms', function () {
    return view('terms');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'RegistrationController@index');
    Route::get('/registration', 'RegistrationController@index')->name('admin.registrations');
    Route::resource('/discount', 'DiscountController');
    Route::resource('/user', 'UserController');
});
