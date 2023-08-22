<?php

use App\Http\Controllers\Dashboard\AdditionalFeaturesControllers;
use App\Http\Controllers\Dashboard\BannerControllers;
use App\Http\Controllers\Dashboard\LoginControllers;
use App\Http\Controllers\Dashboard\CategoryControllers;
use App\Http\Controllers\Dashboard\ContactControllers;
use App\Http\Controllers\Dashboard\CreateinvitationController;
use App\Http\Controllers\Dashboard\DashboardControllers;
use App\Http\Controllers\Dashboard\FAQControllers;
use App\Http\Controllers\Dashboard\PrivacyPolicyControllers;
use App\Http\Controllers\Dashboard\SubscriptionControllers;
use App\Http\Controllers\Dashboard\TermsofserviceController;
use App\Http\Controllers\Dashboard\TrendingControllers;
use App\Http\Controllers\Dashboard\UserControllers;

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

// User
Route::get('user',[UserControllers::class,'index'])->name('user'); 
Route::get('user-create',[UserControllers::class,'create'])->name('user.create'); 
Route::post('user-store',[UserControllers::class,'store'])->name('user.store'); 
Route::get('user-edit/{id}',[UserControllers::class,'edit'])->name('user.edit'); 
Route::post('user-update/{id}',[UserControllers::class,'update'])->name('user.update'); 
Route::delete('user-delete/{id}',[UserControllers::class,'delete'])->name('user.delete'); 
Route::delete('user-delete-all',[UserControllers::class,'deleteAll'])->name('user-delete-all'); 

// Category
Route::get('category',[CategoryControllers::class,'index'])->name('category.index');
Route::post('category-store',[CategoryControllers::class,'store'])->name('category.store');
Route::post('category-update',[CategoryControllers::class,'update'])->name('category.update');
Route::delete('category-delete/{id}',[CategoryControllers::class,'delete'])->name('category.delete');
Route::delete('category-delete-all', [CategoryControllers::class,'deleteAll'])->name('category.delete.all');
Route::post('category-sortabledatatable',[CategoryControllers::class,'updateOrder'])->name('category.sortabledatatable');

// Category Listing
Route::get('category-listing-index',[CategoryControllers::class,'listing'])->name('category.listing.index');
Route::get('category-listing-create',[CategoryControllers::class,'listingCreate'])->name('category.listing.create');
Route::post('category-listing-create',[CategoryControllers::class,'listingCreate'])->name('category.listing.create');
Route::post('category-listing-store',[CategoryControllers::class,'listingStore'])->name('category.listing.store');
Route::get('category-listing-edit/{id}',[CategoryControllers::class,'listingEdit'])->name('category.listing.edit');
Route::post('category-listing-update/{id}',[CategoryControllers::class,'listingUpdate'])->name('category.listing.update');
Route::delete('category-listing-delete/{id}',[CategoryControllers::class,'deleteCategoryListing'])->name('category.listing.delete');
Route::delete('category-listing-delete-all',[CategoryControllers::class,'deleteAllProduct'])->name('category.listing.delete.all');

// subscription 
Route::get('subscription',[SubscriptionControllers::class,'index'])->name('subscription.index');
Route::get('subscription-edit/{id}',[SubscriptionControllers::class,'edit'])->name('subscription.edit');
Route::post('subscription-update/{id}',[SubscriptionControllers::class,'update'])->name('subscription.update');

// FAQ
Route::get('faq',[FAQControllers::class,'index'])->name('faq.index');
Route::get('faq-create',[FAQControllers::class,'create'])->name('faq.create');
Route::post('faq-store',[FAQControllers::class,'store'])->name('faq.store');
Route::get('faq-edit/{id}',[FAQControllers::class,'edit'])->name('faq.edit');
Route::post('faq-update/{id}',[FAQControllers::class,'update'])->name('faq.update');
Route::delete('faq-delete/{id}',[FAQControllers::class,'delete'])->name('faq.delete');
Route::delete('faq-delete-all',[FAQControllers::class,'deleteAll'])->name('faq.delete-all');

// Term Of Service
Route::get('term-service',[TermsofserviceController::class,'index'])->name('term.service.index');
Route::get('term-service-edit/{id}',[TermsofserviceController::class,'edit'])->name('term.service.edit');
Route::post('term-service-update/{id}',[TermsofserviceController::class,'update'])->name('term.service.update');

// Privacy-Policy
Route::get('privacy-policy',[PrivacyPolicyControllers::class,'index'])->name('privacy.policy.index');
Route::get('privacy-policy-edit/{id}',[PrivacyPolicyControllers::class,'edit'])->name('privacy.policy.edit');
Route::post('privacy-policy-update/{id}',[PrivacyPolicyControllers::class,'update'])->name('privacy.policy.update');

// ContactUs
Route::get('contact',[ContactControllers::class,'index'])->name('contact.index');
Route::get('contact-edit/{id}',[ContactControllers::class,'edit'])->name('contact.edit');
Route::post('contact-update/{id}',[ContactControllers::class,'update'])->name('contact.update');

// Create Invitation
Route::get('create-invition',[CreateinvitationController::class,'index'])->name('create.invition.index');
Route::get('create-invition-show',[CreateinvitationController::class,'showInvition'])->name('create.invition.show');
Route::post('rsvp-count',[CreateinvitationController::class,'rsvp'])->name('rsvp.count');
Route::get('invitation-send',[CreateinvitationController::class,'invitationSend'])->name('invitationsend');
Route::get('invitation',[CreateinvitationController::class,'invationclick'])->name('invitation');
Route::get('message',[CreateinvitationController::class,'messagesend'])->name('message');

// Banner 
Route::get('banner',[BannerControllers::class,'index'])->name('banner.index');
Route::post('banner-store',[BannerControllers::class,'store'])->name('banner.store');
Route::post('banner-update',[BannerControllers::class,'update'])->name('banner.update');
Route::delete('banner-delete/{id}',[BannerControllers::class,'delete'])->name('banner.delete');
Route::delete('banner-delete-all',[BannerControllers::class,'deleteAll'])->name('banner.delete-all');

// Trending
Route::get('trending',[TrendingControllers::class,'index'])->name('trending.index');
Route::post('trending-store',[TrendingControllers::class,'store'])->name('trending.store');
Route::post('trending-update',[TrendingControllers::class,'update'])->name('trending.update');
Route::delete('trending-delete/{id}',[TrendingControllers::class,'delete'])->name('trending.delete');
Route::delete('trending-delete-all',[TrendingControllers::class,'deleteAll'])->name('trending.delete.all');

// AdditionalFeaturesControllers
Route::get('additional-features',[AdditionalFeaturesControllers::class,'index'])->name('additional.features.index');
Route::post('additional-features-store',[AdditionalFeaturesControllers::class,'store'])->name('additional.features.store');
Route::post('additional-features-update',[AdditionalFeaturesControllers::class,'update'])->name('additional.features.update');
Route::delete('additional-features-delete/{id}',[AdditionalFeaturesControllers::class,'delete'])->name('additional.features.delete');
Route::delete('additional-features-delete-all',[AdditionalFeaturesControllers::class,'deleteAll'])->name('additional.features.delete.all');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[DashboardControllers::class,'index'])->name('dashboard.index');
    Route::group(['prefix' => 'tables'], function(){
        Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
        // Route::get('data-table', function () { return view('pages.tables.data-table'); });
    });
});


Route::group(['prefix' => 'auth'], function(){
    Route::get('login',[LoginControllers::class,'login'])->name('login');
    Route::post('login-post',[LoginControllers::class,'loginPost'])->name('login.post');
    Route::get('logout',[LoginControllers::class,'logOut'])->name('logout');
    // Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});



Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});



