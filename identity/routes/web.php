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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/identity',[IdentitycardController::class,'user']);

//Route::get('/identity',[App\Http\Controllers\IdentitycardController::class,'user']);

//Route::get('/identity',[IdentitycardController::class,'index']);

Route::get('/identity', [\App\Http\Controllers\IdentitycardController::class,'index']);

Route::get('/brand', [\App\Http\Controllers\BrandController::class,'index']);
Route::get('/product', [\App\Http\Controllers\ProductController::class,'index']);


Route::get('/product/store',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('/product/show-data',[\App\Http\Controllers\ProductController::class,'showData']);