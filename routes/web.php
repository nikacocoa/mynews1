<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

// NewsControllerのルート設定
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
});

// ProfileControllerのルート設定
Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth'], function() {
    Route::get('create', [ProfileController::class, 'add']);
    Route::get('edit', [ProfileController::class, 'edit']);
    Route::post('create', [ProfileController::class, 'create']);
    // 以下の行はProfileControllerに対応するメソッドが必要です
    // Route::post('create', [ProfileController::class, 'create']); // この行は削除または修正する
    // Route::post('edit', [ProfileController::class, 'update']); // この行はProfileControllerにupdateメソッドがある場合に使用
});

// Authのルート
Auth::routes();

// HomeControllerのルート
Route::get('/home', [HomeController::class, 'index'])->name('home');