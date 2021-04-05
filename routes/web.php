<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

# User Login

Route::get('/login',[UserController::class,'login']);

Route::post('/loginuser',[UserController::class,'loginuser']);

Route::get('/register',[UserController::class,'register']);

Route::post('/registeruser',[UserController::class,'registeruser']);

Route::get('/logoutuser',[UserController::class,'logoutuser']);

# Todo
Route::group(['middleware' => 'loginredirect'], function () {

Route::get('/',[TodoController::class,'index']);

Route::get('/createtodo',[TodoController::class,'createtodo']);

Route::post('/savetodo',[TodoController::class,'savetodo']);

Route::get('/edittodo/{id}',[TodoController::class,'edittodo']);

Route::post('/updatetodo/{id}',[TodoController::class,'updatetodo']);

Route::get('/deletetodo/{id}',[TodoController::class,'deletetodo']);

});
