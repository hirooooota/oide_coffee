<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;

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


// Route::name('product.')
//     ->group(function(){
//         Route::get('/','ProductController@index')->name('index');
//         Route::get('product/{id}','ProductController@show')->name('show');
//     });

// Route::name('line_item.')
// ->group(function () {
//     Route::post('/line_item/create', 'LineItemController@create')->name('create');
// });
Route::post('/line_item/create', [LineItemController::class, 'create'])
    ->name('line_item_create');


// Route::get('cart.index')->get('/cart', 'CartController@index');
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart_index');
Route::post('/line_item/delete', [LineItemController::class, 'delete']);
