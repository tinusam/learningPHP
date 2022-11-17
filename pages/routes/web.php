<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'login']);
// ->middleware('alreadyLoggedIn');
Route::get('/registration', [AuthController::class,'registration']);
Route::post('/registerUser', [AuthController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser', [AuthController::class,'loginUser'])->name('loginUser');
Route::get('/dashboard', [AuthController::class,'dashboard']);
// ->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout']);