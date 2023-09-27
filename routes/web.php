<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'getUser'])->name('profile');


    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index')->name('chat');
        Route::post('/chats.store', 'add')->name('chats.store');
//        Route::get('/massages','massages')->name('massages');
        Route::delete('/chat/{id}', 'delete')->name('chat.delete');
        Route::post('/send', 'send')->name('send');
    });
});
