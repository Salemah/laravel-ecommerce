<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class, 'redirect'])->middleware('auth','verified');
//admincontroller
Route::get('/viewcatagory',[AdminController::class, 'viewcatagory']);
Route::post('/add_catagory',[AdminController::class, 'addcatagory']);
Route::get('/deletecatagory/{id}',[AdminController::class, 'deletecatagory']);
Route::get('/viewproduct',[AdminController::class, 'viewproduct']);
Route::get('/showproduct',[AdminController::class, 'showproduct']);
Route::post('/add_products',[AdminController::class, 'addproducts']);
Route::get('/product/delete/{id}',[AdminController::class, 'productdelete']);
Route::get('/product/update/{id}',[AdminController::class, 'productupdate']);
Route::post('update_products/{id}',[AdminController::class, 'updateproducts']);
Route::get('/order',[AdminController::class, 'vieworder']);
Route::get('/delivered/{id}',[AdminController::class, 'delivered']);
Route::get('/printpdf/{id}',[AdminController::class, 'pdfview']);
Route::get('/sendemail/{id}',[AdminController::class, 'sendemail']);
Route::post('/senduseremail/{id}',[AdminController::class, 'senduseremail']);
Route::get('/search',[AdminController::class, 'search']);
//
//user route
Route::get('/productdetails/{id}',[HomeController::class, 'productdetails']);
Route::get('/showcart',[HomeController::class, 'showcart']);
Route::post('/addcart/{id}',[HomeController::class, 'addTocart']);
Route::get('/removecart/{id}',[HomeController::class, 'removecart']);
Route::get('/cashondeliovery',[HomeController::class, 'cashondeliovery']);
Route::get('/stripe/{totalprice}',[HomeController::class, 'stripepayment']);
Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/showorder',[HomeController::class, 'showorder']);
Route::get('/cancelorder/{id}',[HomeController::class, 'cancelorder']);
Route::get('/allproducts',[HomeController::class, 'allproducts']);
