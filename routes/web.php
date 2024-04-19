<?php

use Illuminate\Support\Facades\Route;

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
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

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

Route::get('/food-detail', function () {
    return view('food-detail');
})->name('food-detail');


