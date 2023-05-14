<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
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

Route::get('/','App\Http\Controllers\landingpage\HomeController@index')->name('home.index');
Route::get('/semua_product','App\Http\Controllers\landingpage\AllProductController@index')->name('allProduct.index');
Route::get('/liat_product/nama_product','App\Http\Controllers\landingpage\ShowProductController@index')->name('showProduct.index');
Route::get('/profile/wishlist','App\Http\Controllers\landingpage\WishlistController@index')->name('wishlist.index');
Route::get('/profile/order_information','App\Http\Controllers\landingpage\ProductOrderInformationShopController@index')->name('orderInformation.index');
Route::get('/toko','App\Http\Controllers\landingpage\ShowShopController@index')->name('toko.index');

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

/* ================================================================================================================ *
*                                                                                                                   *
*                                          User Access Role Admin, Seller, Buyer                                    *
*                                                                                                                   *
* ================================================================================================================= */

Route::group(['middleware' => ['role:admin|seller|courier']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('product-category/datatable', [ProductCategoryController::class, 'datatable'])->name('product-category.datatable');
    Route::resource('product-category', ProductCategoryController::class);

    Route::get('product/datatable', [ProductController::class, 'datatable'])->name('product.datatable');
    Route::resource('product', ProductController::class);
});



// Route::group(['middleware' => 'auth:buyer'], function () {
//     Route::get('/kurir/dashboard', [KurirController::class, 'index']);
// });

