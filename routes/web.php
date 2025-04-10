<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JurusanController;

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

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'destroy'])->name('jurusan.delete');  