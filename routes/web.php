<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'postLogin'])->name('post-login');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::prefix('pages')->controller(PageController::class)->group(function() {
        Route::get('/', 'list')->name('pages');
        Route::get('/create', 'create')->name('pages-create');
        Route::post('/create', 'postCreate')->name('pages-post-create');

        Route::get('/{id}/edit', 'update')->name('pages-update');
        Route::post('/{id}/edit', 'postUpdate')->name('pages-post-update');
        
        Route::get('/{id}/delete', 'delete')->name('pages-delete');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('profile', [ProfileController::class, 'postProfile'])->name('post-profile');
});