<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function ()
{
    return view('index',
    [
        "menu"=>"index"
    ]);

})->name('index');

Route::get('/login', function ()
{
    return view('login',
    [
        "menu"=>"login"
    ]);

})->name('login');