<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryProduct;
use App\Http\Controllers\brandProduct;
use App\Http\Controllers\productController;



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
//Frontend
Route::get('/', [HomeController::class,'index']);
//Route::get('/trang-chu',[HomeController::class,'index']);
//Route::get('/trang',[AdminController::class,'index1']);


//Backend
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
// admin logout
Route::get('/admin-logout',[AdminController::class,'admin_logout']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/search',[AdminController::class,'show_dashboard']);


//category product
Route::get('/add-category-product',[categoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[categoryProduct::class,'all_category_product']);
Route::post('/save-category-product',[categoryProduct::class,'save_category_product']);
Route::get('/active/{category_product_id}',[categoryProduct::class,'active']);
Route::get('/unactive/{category_product_id}',[categoryProduct::class,'unactive']);
Route::get('/edit-category-product/{category_product_id}',[categoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[categoryProduct::class,'delete_category_product']);
Route::post('/update-category-product/{category_id}',[categoryProduct::class,'update_category_product']);


//brand product
Route::get('/add-brand-product',[brandProduct::class,'add_brand_product']);
Route::get('/all-brand-product',[brandProduct::class,'all_brand_product']);
Route::post('/save-brand-product',[brandProduct::class,'save_brand_product']);
Route::get('/active-brand/{brand_product_id}',[brandProduct::class,'active']);
Route::get('/unactive-brand/{brand_product_id}',[brandProduct::class,'unactive']);
Route::get('/edit-brand-product/{brand_product_id}',[brandProduct::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[brandProduct::class,'delete_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[brandProduct::class,'update_brand_product']);





//product
Route::get('/add-product',[productController::class,'add_product']);
Route::get('/all-product',[productController::class,'all_product']);
//them san pham
Route::post('/save-product',[productController::class,'save_product']);
Route::get('/active-pro/{id}',[productController::class,'active']);
Route::get('/unactive-pro/{id}',[productController::class,'unactive']);
Route::get('/edit-product/{id}',[productController::class,'edit_product']);
Route::post('/update-product/{id}',[productController::class,'update_product']);
Route::get('/delete-product/{id}',[productController::class,'delete_product']);




