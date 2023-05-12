<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\api\AuthController;
=======
>>>>>>> acd689e79e17665973952cfc2de997be62f34669

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
<<<<<<< HEAD
Route::post('/register',[AuthController::class, 'register']);
Route::get('/{id?}/account-activation/{rand?}', [AuthController::class, 'accountActivation'])->name('activation');
Route::post('/login', [AuthController::class, 'auth']);
=======

>>>>>>> acd689e79e17665973952cfc2de997be62f34669
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
