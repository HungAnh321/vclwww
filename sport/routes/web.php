<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Font;


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

Route::get('/',[Font\HomeController::class, 'index']);

//shop
Route::prefix('shop')->group(function (){
    Route::get('/product/{id}',[Font\ShopController::class, 'show']);
    Route::post('/product/{id}',[Font\ShopController::class, 'add_comment']);

    Route::get('/',[Font\ShopController::class, 'index']);
    Route::get('/{categoryName}',[Font\ShopController::class, 'category']);
    Route::get('/{categoryName}',[Font\HomeController::class, 'category']);

});

//cart
Route::prefix('cart')->group(function () {
    Route::get('add', [Font\CartController::class, 'add']);
    Route::get('/', [Font\CartController::class, 'index']);
    Route::get('/{categoryName}',[Font\CartController::class, 'category']);
    Route::get('delete', [Font\CartController::class, 'delete']);
    Route::get('destroy', [Font\CartController::class, 'destroy']);
    Route::get('updates' , [Font\CartController::class, 'updates']);
});




//admin
Route::get('/admin',[Font\AdminController::class, 'show_admin']);

//category
Route::get('/add-category-product',[Font\CategoryController::class, 'add_category_product']);
Route::get('/all-category-product',[Font\CategoryController::class, 'all_category_product']);
Route::post('/save-category-product',[Font\CategoryController::class, 'save_category_product']);
Route::get('/unactive-category-product/{category_product_id}',[Font\CategoryController::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [Font\CategoryController::class,'active_category_product']);
Route::get('/delete-category-product/{category_product_id}',[Font\CategoryController::class,'delete_category_product']);
Route::get('/edit-category-product/{category_product_id}',[Font\CategoryController::class,'edit_category_product']);
Route::post('/update-category-product/{category_product_id}',[Font\CategoryController::class, 'update_category_product']);

//brand
Route::get('/add-brand',[Font\BrandController::class, 'add_brand']);
Route::get('/all-brand',[Font\BrandController::class, 'all_brand']);
Route::post('/save-brand',[Font\BrandController::class, 'save_brand']);
Route::get('/unactive-brand/{brand_id}',[Font\BrandController::class, 'unactive_brand']);
Route::get('/active-brand/{brand_id}', [Font\BrandController::class,'active_brand']);
Route::get('/delete-brand/{brand_id}',[Font\BrandController::class,'delete_brand']);
Route::get('/edit-brand/{brand_id}',[Font\BrandController::class,'edit_brand']);
Route::post('/update-brand/{brand_id}',[Font\BrandController::class, 'update_brand']);

//product
Route::get('/add-product',[Font\ProductController::class, 'add_product']);

