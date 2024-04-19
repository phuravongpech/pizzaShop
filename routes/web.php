<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FoodsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/profile', function () {
    return view('user.profile');
})->name('profile');

Route::get('/address', function () {
    return view('user.address');
})->name('address');

Route::get('/password', function () {
    return view('user.password');
})->name('password');

Route::get('/order', function () {
    return view('user.order');
})->name('order');
