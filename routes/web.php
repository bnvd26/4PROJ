<?php

use App\Http\Controllers\PlatformAdmin\CampusController;
use App\Http\Controllers\PlatformAdmin\UserController;
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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('platform_administrator')->group(function () {
        Route::resource('users', UserController::class)->except('destroy');
        Route::resource('campuses', CampusController::class)->except('destroy');
    });
});
