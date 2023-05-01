<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::group(['middleware' => 'auth:seller'], function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index']);
});
Route::group(['middleware' => 'auth:buyer'], function () {
    Route::get('/kurir/dashboard', [KurirController::class, 'index']);
});

Route::group(['middleware' => 'auth:couries'], function () {
    Route::get('/kurir/dashboard', [KurirController::class, 'index']);
});
