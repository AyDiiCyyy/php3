<?php

use App\Http\Controllers\UserContronller;
use App\Http\Middleware\AdminMiddleware;
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
// Route::middleware('auth')
Route::get('/',[UserContronller::class,'dk'])->name('dk');
Route::post('/',[UserContronller::class,'dk'])->name('postdk');
Route::get('login',[UserContronller::class,'dn'])->name('dn');
Route::post('login',[UserContronller::class,'dn'])->name('dn');
Route::middleware('auth')->group(function(){
    Route::get('update',[UserContronller::class,'update'])->name('update');
    Route::put('update',[UserContronller::class,'update'])->name('update');
    Route::get('thongtin',[UserContronller::class,'thongtin'])->name('thongtin');
    Route::get('doimk',[UserContronller::class,'doimk'])->name('doimk');
    Route::put('doimk',[UserContronller::class,'doimk'])->name('doimk');
    Route::get('dangxuat',[UserContronller::class,'dangxuat'])->name('dangxuat');
});
Route::middleware(AdminMiddleware::class)->controller(UserContronller::class)->prefix('admin')->group(function(){
    Route::get('list','list')->name('admin.list');
    Route::get('update/{user}','updateNew')->name('admin.update');
    Route::put('update/{user}','updateNew')->name('admin.update');
    Route::delete('delete/{user}','delete')->name('admin.delete');
});
