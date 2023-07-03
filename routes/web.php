<?php

use App\Http\Controllers\Dashboard\BannerControllers;
use App\Http\Controllers\Dashboard\LoginControllers;
use App\Http\Controllers\Dashboard\CategoryControllers;
use App\Http\Controllers\Dashboard\CreateinvitationController;
use App\Http\Controllers\Dashboard\DashboardControllers;
use App\Http\Controllers\Dashboard\FAQControllers;
use App\Http\Controllers\Dashboard\SubscriptionControllers;
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

// createinvitation
Route::get('create-invition',[CreateinvitationController::class,'index'])->name('create.invition.index');
Route::get('create-invition-show',[CreateinvitationController::class,'showInvition'])->name('create.invition.show');

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[DashboardControllers::class,'index'])->name('dashboard.index');
    Route::group(['prefix' => 'tables'], function(){
        Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
        // Route::get('data-table', function () { return view('pages.tables.data-table'); });
    });
});


Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('accordion', function () { return view('pages.ui-components.accordion'); });
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sortablejs', function () { return view('pages.advanced-ui.sortablejs'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login',[LoginControllers::class,'login'])->name('login');
    Route::post('login-post',[LoginControllers::class,'loginPost'])->name('login.post');
    Route::get('logout',[LoginControllers::class,'logOut'])->name('logout');
    // Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error.404');
})->where('page','.*');



