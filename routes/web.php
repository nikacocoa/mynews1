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
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
});

// ProfileControllerのルート設定
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('profile', 'index')->name('profile.index'); // プロフィールの一覧表示用のルートを追加
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit/{id}', 'edit')->name('profile.edit');
    Route::post('profile/edit/{id}', 'update')->name('profile.update');
});

// Authのルート
Auth::routes();

// HomeControllerのルート
Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');