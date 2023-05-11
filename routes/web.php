<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/confirm_verification_email', function () {
    return view('verifyAccount');
})->name('procces_verification');
// Route::post('/forgot-password', [AuthController::class, 'mailSend'])->middleware('guest')->name('password.email');

Route::get('/successfuly_verification', function () {
    return view('successfuly_verification');
})->name('success_verification');

Route::get('/{id?}/account-activation/{rand?}', [AuthController::class, 'accountActivation'])->name('activation');

Route::get('/forgot-password', function (){
    return view('forgotPassword');
})->name('forgot-password');

Route::post('/forgot-password', [AuthController::class, 'mailSend'])->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('resetPassword', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'passwordReset'])->name('password.update');

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'create')->name('register.process');

    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('login.process');
    Route::get('/logout', 'logout')->name('logout');

});

Route::group(['middleware' => ['role:admin|seller|courier']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



// Route::group(['middleware' => 'auth:buyer'], function () {
//     Route::get('/kurir/dashboard', [KurirController::class, 'index']);
// });

