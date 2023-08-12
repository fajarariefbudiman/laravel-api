<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return "Hello World";
});


Route::get('/products',[ProductController::class,'index'])->middleware(['auth:sanctum']);
Route::get('/products/{id}',[ProductController::class,'show'])->middleware(['auth:sanctum']);
Route::post('/products', [ProductController::class,'store'])->middleware(['auth:sanctum']);
Route::delete('/products/{id}', [ProductController::class,'destroy'])->middleware(['auth:sanctum']);
Route::put('/products/{id}', [ProductController::class,'update'])->middleware(['auth:sanctum']);

// Route::get('/users',[UserController::class,'index'])->middleware(['auth:sanctum']);
// Route::get('/users/{id}',[UserController::class,'show'])->middleware(['auth:sanctum']);
Route::post('/users', [UserController::class,'store']);
// Route::delete('/users/{id}', [UserController::class,'destroy'])->middleware(['auth:sanctum']);
// Route::put('/users/{id}', [UserController::class,'update'])->middleware(['auth:sanctum']);

Route::get('/categories',[CategoryController::class,'index'])->middleware(['auth:sanctum']);
Route::get('/categories/{id}',[CategoryController::class,'show'])->middleware(['auth:sanctum']);
Route::post('/categories', [CategoryController::class,'store'])->middleware(['auth:sanctum']);
Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->middleware(['auth:sanctum']);
Route::put('/categories/{id}', [CategoryController::class,'update'])->middleware(['auth:sanctum']);


Route::post('/login', [AuthenticateController::class,'login'])->middleware('guest');
Route::post('/logout', [AuthenticateController::class,'logout'])->middleware(['auth:sanctum']);

