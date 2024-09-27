<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $sanpham = Product::all();
        return view('admin.product.list',compact('sanpham'));
    }
    public function add(Request $request){
        $category=Category::all();
        if($request->isMethod('POST')){
            $data= $request->except('image');
            if ($request->hasFile('image')) {
                $path_image = $request->file('image')->store('images','public');
                $data['image'] = $path_image;
            }
            // dd($data);
            Product::query()->create($data);
            return redirect()->route('admin.product.list');
        }
        return view('admin.product.add',compact('category'));
    }
    public function edit($id,Request $request){
        $product=Product::query()->findOrFail($id);
        
        $categories =Category::all();
        if($request->isMethod('PUT')){
            $data = $request->except('image');

            $old_image = $product->image;
            $data['image'] = $old_image;
            if($request->hasFile('image')){
                $path_image = $request->file('image')->store('images','public');
                $data['image'] = $path_image;
            }

            $product->update($data);
            if($request->hasFile('image')){
                if(file_exists('storage/'.$old_image)){
                    unlink('storage/'.$old_image);
                }
            }
            return redirect()->route('admin.product.list');
        }
        return view('admin.product.edit',compact('product', 'categories'));
    }
    public function delete($id){
        $product = Product::query()->findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.list');
    }
    public function thongke(){
        $totalProducts = Product::query()->count();
        $productsByCategory  = Product::all()->groupBy('category_id');
        foreach ($productsByCategory as $categoryId => $products) {
            $categoryName = Category::find($categoryId)->name;
            $productCount = $products->count();
        
            $result[] = [
                'category_name' => $categoryName,
                'product_count' => $productCount,
            ];
        }
        $user= User::count();
        // dd($result);
        return view('admin.thongke.list',compact('totalProducts','result','user'));
    }
}
