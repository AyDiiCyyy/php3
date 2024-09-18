<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $listSpMax = DB::table('books')
    ->select('books.*','categories.name')
    ->join('categories','Category_id','categories.id')
    ->orderBy('Price','DESC')
    ->limit(8)
    ->get();
    
    $listSpMin = DB::table('books')
    ->select('books.*','categories.name')
    ->join('categories','Category_id','categories.id')
    ->orderBy('Price','ASC')
    ->limit(8)
    ->get();

    return view('home',compact('listSpMax','listSpMin'));
})->name('home');
Route::get('/categories/{id?}', function (?int $id=null) {
    if ($id == null){
        $listSp= DB::table('books')
        ->select('books.*','categories.name')
        ->join('categories','Category_id','categories.id')
        ->get();
    }else{
        $listSp= DB::table('books')
        ->select('books.*','categories.name')
        ->join('categories','Category_id','categories.id')
        ->where('Category_id',$id)
        ->get();
    }

    $category = DB::table('categories')
    ->get();

    return view('category',compact('listSp','category'));
})->name('categories');

Route::get('detai/{id}',function (int $id) {
    $sp = DB::table('books')
    ->join('categories','Category_id','categories.id')
    ->where('books.id',$id)
    ->first();
    return view('detail',compact('sp'));
})->name('detai');