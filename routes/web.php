<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LineItemController;
// use App\Http\Controllers\ContactController;

use Illuminate\Http\Request;

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

Route::post('/line_item/delete', [LineItemController::class, 'delete'])
    ->name('cart_delete');

//ユーザー側
Route::prefix('{lang}')->where(['lang' => 'ja|en'])->group(function () {
    Route::get('demo/{param?}', function () {
        return view('demo');
    });
});

// 404 Not Found
Route::fallback(function (Request $request) {
    $route = Route::getCurrentRoute();
    // WEB側画面
    if (empty($route->getPrefix())) {
        $fallback = $route->parameter('fallbackPlaceholder');
        // 言語用Prefixが存在しない場合、言語を設定してリダイレクトする
        if ($fallback === null || (strpos($fallback, 'ja') === false && strpos($fallback, 'en') === false)) {
            $path = $request->getPathInfo();
            return redirect('/ja' . $path);
        }
    }
    return abort(404);
});

Route::controller(CartController::class)->group(function () {
    Route::name('cart.')->group(function () {
        Route::get('/cart/checkout', 'checkout')->name('checkout');
        Route::get('/cart/success', 'success')->name('success');
    });
});

Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('index');
//確認ページ
Route::post('/contact/confirm', 'App\Http\Controllers\ContactController@confirm')->name('confirm');
//送信完了ページ
Route::post('/contact/thanks', 'App\Http\Controllers\ContactController@send')->name('send');
