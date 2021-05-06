<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::group(['middleware' => 'jwt.verify'], function(){
	Route::get('post', [PostController::class, 'index']);
	Route::get('post/{id}/show', [PostController::class, 'show']);
	Route::post('post/store', [PostController::class, 'store']);
	Route::put('post/{id}/update', [PostController::class, 'update']);
	Route::delete('post/{id}/destroy', [PostController::class, 'destroy']);

	Route::get('token/refresh', [LoginController::class, 'refresh']);
});