<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['as' => 'auth.', 'controller' => AuthController::class], function () {
        Route::get('/auth', 'getAuth')->name('getAuth');
        Route::post('/logout', 'logout')->name('logout');
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
    });
});
