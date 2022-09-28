<?php

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

Route::redirect('/', '/login');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('home')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

		Route::resource('register', App\Http\Controllers\RegisterController::class)->names('register');
		Route::resource('reserve', App\Http\Controllers\ReserveController::class)->names('reserve');
    });

});
