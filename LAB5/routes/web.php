<?php

use App\Http\Controllers\MovieController;
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

Route::get('show/{id}',[MovieController::class,'show'])->name('show');
Route::get('/',[MovieController::class,'index'])->name('list');
Route::post('/',[MovieController::class,'index'])->name('list');
Route::get('add',[MovieController::class,'add'])->name('add');
Route::post('add',[MovieController::class,'add'])->name('add');
Route::get('edit/{id}',[MovieController::class,'edit'])->name('edit');
Route::put('edit/{id}',[MovieController::class,'edit'])->name('edit');
Route::get('delete{id}',[MovieController::class,'delete'])->name('delete');
