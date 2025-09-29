<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;
use App\Models\Product;
use GuzzleHttp\Middleware;

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
Route::get('/', [ShopController::class,'getshops'])->name('shop');
Route::get('/product/{shop_id?}',[ProductController::class,'getproducts'])->name('products');
Route::get('/addproduct',[ProductController::class,'addproduct'])->name('addproduct')->middleware('auth');
Route::post('/storeproduct',[ProductController::class,'storeproduct'])->name('storeproduct');
Route::post('/removeproduct/{product_id?}',[ProductController::class,'removeproduct']);
Route::get('/editproduct/{product_id?}',[ProductController::class,'editproduct']);
Route::post('/storeupdate/{product_id}',[ProductController::class,'storeupdate']);
Route::get('/review',[ReviewController::class,'review']);
Route::post('/addreview',[ReviewController::class,'addreview']);
Route::post('/search',[ShopController::class,'search']);
Route::get('/productsTable',[ProductController::class,'productsTable']);

Route::get('/cart',[CartController::class,'index'])->name('cart')->middleware('auth');
Route::post('/add-to-cart/{id}', [CartController::class, 'store']);

Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

