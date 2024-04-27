<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
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


Route::get('/menu', [FoodController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/profile', [UserController::class, 'index'])->name('profile');

Route::get('/address', [UserController::class, 'address'])->name('address');

Route::get('/address', [AddressController::class, 'index'])->name('address');

Route::get('/password', function () {
    return view('user.password');
})->name('password');

Route::get('/order', function () {
    return view('user.order');
})->name('order');

// Route::get('/food-detail', function () {
//     return view('food-detail');
// })->name('food-detail');

Route::get('/food-detail/{id}', [FoodController::class, 'show'])->name('food-detail');


Route::get('/viewcart', [AddressController::class, 'cartAddress'])->name('viewcart');

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
Route::get('/stripe/webhook',[StripeController::class,'handleWebhook']);
 
Route::get('/menu', [FoodsController::class, 'index']);
Route::get('cart', [FoodsController::class, 'cart'])->name('cart');
// Route::get('add-to-cart/{id}', [FoodsController::class, 'addToCart'])->name('add_to_cart');
Route::post('add-to-cart/{id}', [FoodsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [FoodsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [FoodsController::class, 'remove'])->name('remove_from_cart');
