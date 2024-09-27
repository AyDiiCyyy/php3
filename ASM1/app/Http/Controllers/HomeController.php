<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function productDetail($id){
        $productDetail = Product::query()->findOrFail($id);
        return view('productDetail', compact('productDetail'));
        
    }
    public function search ($id=null, Request $request){
        if($id===null){
            $sp = Product::all()->where('name',"LIKE",'%Ghế%');
            dd(123);
        }else{
            $sp = Product::where('name',"LIKE","%{$request->search}%")->where('category_id',$id)->get();
            return view('shop', compact('sp'));
        }
    }
}
