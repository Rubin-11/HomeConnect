<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
