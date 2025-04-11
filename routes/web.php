<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
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

Route::get('/user', [LoginController::class, 'user'])->name('user.index');


Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::get('/guru/show/{id}', [GuruController::class, 'show'])->name('guru.show');
Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.delete');  

Route::get('/lokal', [LokalController::class, 'index'])->name('lokal.index');
Route::get('/lokal/create', [LokalController::class, 'create'])->name('lokal.create');
Route::post('/lokal', [LokalController::class, 'store'])->name('lokal.store');
Route::get('/lokal/edit/{id}', [LokalController::class, 'edit'])->name('lokal.edit');
Route::put('/lokal/update', [LokalController::class, 'update'])->name('lokal.update');
Route::get('/lokal/show/{id}', [LokalController::class, 'show'])->name('lokal.show');
Route::delete('/lokal/delete/{id}', [LokalController::class, 'destroy'])->name('lokal.delete');