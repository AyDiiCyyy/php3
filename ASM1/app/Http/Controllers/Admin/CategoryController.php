<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        // Paginate the categories, showing 10 per page
        $categoriesAdmin = Category::paginate(10);

        // Pass the paginated categories to the view
        return view('admin.category.list', compact('categoriesAdmin'));
    }
    public function add(Request $request){
        if($request->isMethod('POST')){
            $data = $request->except('image');
            if ($request->hasFile('image')) {
                $path_image = $request->file('image')->store('images','public');
                $data['image'] = $path_image;
            }
            Category::create($data);
            return redirect()->route('admin.category.list');
        }
        return view('admin.category.add');
    }

    public function edit(Request $request, $id){

        $category = Category::query()->findOrFail($id);
        if($request->isMethod('PUT')){
            $data = $request->except('image');
            $old_image = $category->image;
            $data['image'] = $old_image;
            if ($request->hasFile('image')) {
                if (file_exists('storage/'. $old_image)) {
                    unlink('storage/'. $old_image);
                }
                $path_image = $request->file('image')->store('images','public');
                $data['image'] = $path_image;
            }
            $category->update($data);
            return redirect()->route('admin.category.list');
        }
        return view('admin.category.edit', compact('category'));
    }
    public function delete($id){
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.list');
    }
}
