<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

//ユーザー側
Route::prefix('{lang}')->where(['lang' => 'ja|en'])->group(function() {
    Route::get('demo/{param?}', function(){
        return view ('demo');
    });
});

// 404 Not Found
Route::fallback(function(Request $request){
    $route = Route::getCurrentRoute();
    // WEB側画面
    if( empty($route->getPrefix()) ){
        $fallback = $route->parameter('fallbackPlaceholder');
        // 言語用Prefixが存在しない場合、言語を設定してリダイレクトする
        if( $fallback === null || (strpos($fallback, 'ja') === false && strpos($fallback, 'en') === false) ){
            $path = $request->getPathInfo();
            return redirect('/ja'.$path);
        }
    }
    return abort(404);
});
