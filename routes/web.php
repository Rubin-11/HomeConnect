<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'getUser'])->name('profile');
    Route::get('/chat', [ChatController::class, 'getChat'])->name('chat');
    Route::post('/chats.store',[ChatController::class, 'addChat'])->name('chats.store');
});
