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

Route::view('/', 'users');

Route::middleware('guest')->group(function(){
	Route::view('/register', 'auth.register')
		->name('register');

	Route::view('/login', 'auth.login')
		->name('login');
});

Route::middleware('auth')->group(function(){
	Route::get('logout', function(){
		Auth::logout();
	})->name('logout');

	Route::view('/home', 'home')
		->name('home');
});
