<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController as PublicNewsController;
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

// 一般ユーザー向けのプロフィールページへのルート
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

// ホームページのルート
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

// 管理者用のProfileControllerのルート設定
Route::controller(AdminProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('profile', 'index')->name('admin.profile.index');
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit/{id}', 'edit')->name('profile.edit');
    Route::post('profile/edit/{id}', 'update')->name('profile.update');
});

// Authのルート
Auth::routes();

// HomeControllerのルート
Route::get('/home', [HomeController::class, 'index'])->name('home');

// パブリックなニュースページのルート
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');
