<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('profile.welcome');
// })->name('welcome');

Route::get('/', [ProductController::class, 'index'])
    ->name('products.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('products', ProductController::class)
    ->only(['show', 'index']);

Route::controller(CartController::class)->group(function() {
    Route::name('cart.')->group(function () {
        Route::get('/cart', 'index')->name('index');
        Route::get('/cart/checkout', 'checkout')->name('checkout');
    });
});
