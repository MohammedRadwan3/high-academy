<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localeCookieRedirect']
    ],
    function () {
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class,'index'])->name('home');
            // Route::get('/contact-us', [UserController::class,'contactUs'])->name('contact');
            Route::get('/shop', [UserController::class,'shop'])->name('shop');
            // Route::get('product/detail/{id}', [UserController::class, 'productDetail'])->name('detail');

        });
    }
);
