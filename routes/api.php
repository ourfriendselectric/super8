<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->post('/registration/code', 'RegistrationController@code');
Route::middleware('api')->post('/registration/check', 'RegistrationController@check');
Route::middleware('api')->resource('registration', 'RegistrationController');

Route::middleware('api')->post('/discount/check', 'DiscountController@check');
Route::middleware('api')->resource('discount', 'DiscountController');

Route::middleware('api')->resource('song', 'SongController');
Route::middleware('api')->resource('video', 'VideoController');