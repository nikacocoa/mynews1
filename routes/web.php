<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

// トップページ
Route::get('/', function () {
    return view('welcome');
});

// NewsControllerのルート設定
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit/{id}', 'edit')->name('news.edit');
    Route::post('news/edit/{id}', 'update')->name('news.update');
    Route::get('news/delete/{id}', 'delete')->name('news.delete');
});

// ProfileControllerのルート設定
Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth'], function() {
    Route::get('create', [ProfileController::class, 'add']);
    Route::post('create', [ProfileController::class, 'create']);
    Route::get('edit/{id}', [ProfileController::class, 'edit']); // プロフィール編集用ルート
    Route::post('edit/{id}', [ProfileController::class, 'update']); // プロフィール更新用ルート
});

// Authのルート
Auth::routes();

// HomeControllerのルート
Route::get('/home', [HomeController::class, 'index'])->name('home');