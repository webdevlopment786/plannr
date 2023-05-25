<?php

use App\Http\Controllers\API\CategoryControllers;
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

// Login and Register API
Route::post('login',[APILoginControllers::class,'login']);
Route::post('register',[APILoginControllers::class,'register']);
Route::post('otp-verification',[APILoginControllers::class,'otpVerification']);
Route::post('forget-password',[APILoginControllers::class,'forgetPassword']);
Route::post('reset-password',[APILoginControllers::class,'resetPassword']);

// Category
Route::get('category',[CategoryControllers::class,'index']);
Route::get('product',[CategoryControllers::class,'product']);
Route::get('color',[CategoryControllers::class,'color']);
Route::post('search-fitter',[CategoryControllers::class,'searchFitter']);


//Google
Route::get('/login/google', [APILoginControllers::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [APILoginControllers::class, 'handleGoogleCallback']);

Route::get('/redirect/{provider}', [APILoginControllers::class, 'redirectToProvider'])->where('provider', '[A-Za-z]+');
Route::get('/{provider}/callback', [APILoginControllers::class, 'handleProviderCallback'])->where('provider', '[A-Za-z]+');
//Facebook
Route::get('/login/facebook', [APILoginControllers::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [APILoginControllers::class, 'handleFacebookCallback']);


