<?php

use App\Http\Controllers\API\CategoryControllers;
use App\Http\Controllers\API\LoginControllers as APILoginControllers;
use App\Http\Controllers\API\HomePageControllers;
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

// Login and Register API
Route::post('login',[APILoginControllers::class,'login']);
Route::post('register',[APILoginControllers::class,'register']);
Route::post('otp-verification',[APILoginControllers::class,'otpVerification']);
Route::post('forget-password',[APILoginControllers::class,'forgetPassword']);
Route::post('reset-password',[APILoginControllers::class,'resetPassword']);
Route::post('resend-otp',[APILoginControllers::class,'resendOTP']);

// Category
Route::get('category',[CategoryControllers::class,'index']);
Route::get('product',[CategoryControllers::class,'product']);
Route::get('color',[CategoryControllers::class,'color']);
Route::post('search-fitter',[CategoryControllers::class,'searchFitter']);

// home Sccreen 
Route::get('banner',[HomePageControllers::class,'banner']);

//Google
Route::get('/login/google', [APILoginControllers::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [APILoginControllers::class, 'handleGoogleCallback']);


//Facebook
Route::get('/login/facebook', [APILoginControllers::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [APILoginControllers::class, 'handleFacebookCallback']);


// Route::get('redirect/{provider}', [APILoginControllers::class, 'redirect']);
// Route::get('login/{provider}', [APILoginControllers::class, 'callback']);