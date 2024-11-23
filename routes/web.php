<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//registration page

Route::get('/',[UserController::class,'index'])->name('register');
Route::post('/register',[UserController::class,'store'])->name('user.register');


//Login related route
Route::get('/login',[AuthController::class,'index'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');


Route::group(['middleware'=> 'auth'], function(){
    // Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/{search?}',[DashboardController::class,'index'])->name('dashboard');
  

    //Book related Route
    Route::post('/book-rate/{book}',[BookController::class,'rateBook'])->name('books.rate');
    Route::post('/book-comment/{book}',[CommentController::class,'store'])->name('comments.store');


    ////Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

