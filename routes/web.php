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
Auth::routes();

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegister'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  
/* New Added Routes */
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
 
Route::get('/', [FoodsController::class, 'index']);
Route::get('cart', [FoodsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FoodsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [FoodsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [FoodsController::class, 'remove'])->name('remove_from_cart');

