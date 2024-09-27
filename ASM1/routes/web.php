<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Clients
Route::get('/',function(){
    $user=Auth::user();
    return view('home',compact('user'));
})->name('home');
// Route::get('/home', [ProductsController::class,'index'])->name('home');
Route::get('/shop/{category_id?}', function ($category_id = null) {
    return view('shop', compact('category_id'));
})->name('shop');

Route::post('/shop/{id?}',[HomeController::class,'search'])->name('search');
Route::get('/productDetail/{id}', [HomeController::class,'productDetail'])->name('productDetail');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'register'])->name('register');
Route::get('logout',[UserController::class,'logout'])->name('logout');


Route::middleware('auth',AdminMiddleware::class)->prefix('admin')->group(function(){
    Route::controller(ProductController::class)->prefix('product')->group(function(){
        Route::get('list','list')->name('admin.product.list');
        Route::get('add','add')->name('admin.product.add');
        Route::post('add','add')->name('admin.product.add');
        Route::get('edit{id}','edit')->name('admin.product.edit');
        Route::put('edit{id}','edit')->name('admin.product.edit');
        Route::delete('delete{id}','delete')->name('admin.product.delete');
    });
    Route::prefix('category')->group(function () {
        Route::get("/list", [CategoryController::class, "list"])->name('admin.category.list');
        Route::get("/create", [CategoryController::class, "add"])->name('admin.category.add');
        Route::post("/create", [CategoryController::class, "add"])->name('admin.category.add');
        Route::get("/edit/{id}", [CategoryController::class, "edit"])->name('admin.category.edit');
        Route::put("/edit/{id}", [CategoryController::class, "edit"])->name('admin.category.edit');
        Route::delete("/delete/{id}", [CategoryController::class, "delete"])->name('admin.category.delete');
     });
     Route::controller(UserController::class)->group(function(){
         Route::get('list','list')->name('admin.list');
         Route::get('update/{user}','updateNew')->name('admin.update');
         Route::put('update/{user}','updateNew')->name('admin.update');
         Route::delete('delete/{user}','delete')->name('admin.delete');

     });
     Route::get('thongke',[ProductController::class, "thongke"])->name('admin.thongke');
});
