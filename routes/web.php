<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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
Route::get('/add-image-product/{product_id}',[ProductController::class,'add_image']);
Route::post('/upload-image/{product_id}',[ProductController::class,'uploadimage']);
Route::post('/destroy_img/{image_id}',[ProductController::class,'destroyimage']);
Route::get('/show_product/{product_id}',[ProductController::class,'show_product']);
Route::get('/cart',[CartController::class,'index'])->name('cart')->middleware('auth');
Route::post('/add-to-cart/{id}', [CartController::class, 'store']);
Route::get('/remove/{product_id}',[CartController::class,'remove_product'])->name('cartproduct_remove');

Route::get('/checkout',[OrderController::class,'index']);
Route::post('/store_order',[OrderController::class,'store_order']);
Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

