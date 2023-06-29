<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('cart',[ApiController::class,'addToCart']);
    Route::get('cart',[ApiController::class,'getToCart']);
    Route::post('order',[ApiController::class,'order']);
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('categories',[ApiController::class,'getCategories']);
Route::get('category/{id}',[ApiController::class,'getCategory']);
Route::get('products',[ApiController::class,'getproducts']);
Route::get('product/{id}',[ApiController::class,'getproduct']);
