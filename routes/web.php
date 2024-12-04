<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use Illuminate\Http\Request;

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
    return view('content');
})->name('welcome');


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/panel', [AdminController::class, 'index'])->name('admin');
    Route::get('/addNewProduct', [AdminController::class, 'addNewProduct'])->name('addNewProduct');
    Route::post('/addNewProduct', [AdminController::class, 'createNewProduct']);
    Route::get('/adminProductUpdate/{id}', [AdminController::class, 'adminProductUpdate'])->name('adminProductUpdate');
    Route::post('/adminProductUpdate/{id}', [AdminController::class, 'uploadProduct']);
    Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');

    Route::get('/showOrder', [AdminController::class, 'showOrder'])->name('showOrder');
    Route::get('/addNewOrder', [AdminController::class, 'addNewOrder'])->name('addNewOrder');
    Route::get('/adminOrderUpdate/{id}', [AdminController::class, 'adminOrderUpdate'])->name('adminOrderUpdate');
    Route::post('uploadOrder', [AdminController::class, 'uploadOrder'])->name('uploadOrder');
    Route::get('/deleteOrder/{id}', [AdminController::class, 'deleteOrder'])->name('deleteOrder');

});

Route::prefix('catalog')->group(function () {
    Route::get('/{id}/sortPrice',[CatalogController::class,'sortPrice'])->name('sortPrice');
    Route::get('/{id}', [CatalogController::class, 'showCatalog'])->name('showProduct');
    Route::post('/', [CartController::class, 'addToCart'])->name('addToCart');

    Route::get('/{id}/sortBy', [CatalogController::class, 'sortBy'])->name('sortBy');
    Route::get('showCatalog/{id}',[CatalogController::class,'showCatalog'])->name('showCatalog');
    Route::get('showProduct/{id}',[CatalogController::class,'showProduct'])->name('showProduct');
});

Route::get('search', [CatalogController::class, 'search'])->name('search');


Route::post('loginSuccess', [CustomAuthController::class, 'customLogin'])->name('loginCustom');
Route::post('registrationSuccess', [CustomAuthController::class, 'customRegistration'])->name('registerCustom');
Route::get('signOutSuccess', [CustomAuthController::class, 'signOut'])->name('signout');

Route::prefix('user')->group(function () {
    Route::post('Order', [OrderController::class, 'addOrder'])->name('addOrder');
    //Route::get('/addOrder', [OrderController::class, 'index'])->name('addOrderView');
    Route::get('/getOrder', [OrderController::class, 'getOrder'])->name('getOrder');
    Route::get('/deleteOrder/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
});

Route::get('/makeOrder', [OrderController::class, 'makeOrder'])->name('makeOrder');


Route::get('/cart', [CartController::class, 'cartView'])->name('cartView');

Route::post('/cart', [CartController::class, 'cartPost']);
Route::post('/cart/changeQuantity', [CartController::class, 'changeQuantity'])->name('changeQuantity');

Route::get('/orderConfirmation', [OrderController::class, 'confirmationView'])->middleware('users')->name('orderConfirmation');
Route::post('/orderConfirmation', [OrderController::class, 'confirmationPost']);

Route::get('/orderDetails/{order}', [OrderController::class, 'orderDetailsView'])->middleware('users')->name('orderDetailsView');
Route::get('/orderDetails/{order}', [OrderController::class, 'orderDetailsPost']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('welcome');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware('verified')->group(function (){

});
