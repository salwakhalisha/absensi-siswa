<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index', [
        "menu" => "index"
    ]);
})->name('index');

Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');

Route::get('/login', [LoginController::class, 'loginView'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

