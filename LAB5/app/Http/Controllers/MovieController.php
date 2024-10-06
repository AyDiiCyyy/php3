<?php

namespace App\Http\Controllers;

use App\Models\Gene;
use App\Models\Moive;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request){
        $moive = Moive::query()->paginate(10);
        if($request->isMethod('POST')){
        $moive = Moive::query()
        ->where('title','LIKE',"%{$request->input('query')}%")
        ->paginate(10);
        }
        return view('movies.list',compact('moive'));
    }
    public function add(Request $request){
        $listCate = Gene::all();
        if($request->isMethod('POST')){
            $data = $request->except('poster');
            $data['poster'] = "";
             if ($request->hasFile('poster')) {
             $path_image = $request->file('poster')->store('poster','public');
             $data['poster'] = $path_image;
             Moive::query()->create($data);
             return redirect()->route('list');
        }
    }
        return view('movies.add',compact('listCate'));
    }


    public function edit(Request $request,$id){
        $listCate = Gene::all();
        $one = Moive::query()->find($id);
        if($request->isMethod('PUT')){
            $data = $request->except('poster','_token','_method');
            // $data['poster'] = "";
             if ($request->hasFile('poster')) {
             $path_image = $request->file('poster')->store('poster','public');
             $data['poster'] = $path_image;
        }

        Moive::query()->where('id',$id)->update($data);
        return redirect()->route('edit',['id'=>$id]);
    }
        return view('movies.edit',compact('listCate','one'));
    }

    public function delete($id){
        Moive::query()->find($id)->delete();
        return redirect()->route('list');
    }
    public function show($id){
        $one = Moive::query()->find($id);
        return view('movies.show',compact('one'));
    }

}
