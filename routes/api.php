<?php

use App\Http\Controllers\API\LoginControllers as APILoginControllers;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[APILoginControllers::class,'login']);
Route::post('register',[APILoginControllers::class,'register']);
Route::post('otp-verification',[APILoginControllers::class,'otpVerification']);



