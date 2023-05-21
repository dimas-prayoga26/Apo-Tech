<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;

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
Route::post('/register',[AuthController::class, 'register']);
Route::get('/{id?}/account-activation/{rand?}', [AuthController::class, 'accountActivation'])->name('activation');
Route::post('/login', [AuthController::class, 'auth']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/product', ProductController::class);
Route::get('/category/{id?}/products', [CategoryController::class, 'showProducts']);
Route::apiResource('/category', CategoryController::class);
