<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login (Request $request){
        if($request->isMethod('POST')){
            $fl=true;
            $data = $request->only(['email', 'password']);
            // dd($data);
            if (Auth::attemptWhen($data,function($user) use (&$fl){
                
                if ($user->active==1){
                    
                    return true;
                }else{
                    $fl=false;
                    return false;
                }
            })) {
                return redirect()->route('admin.product.list');
            } else {
                if ($fl==true){
                    return redirect()->back()->with('error', 'Tên hoặc Password không chính xác');
                }else {
                    return redirect()->back()->with('error', 'Tài khoản đã bị khóa');
                }
            }
            // User::query()->create($request->all());
            // return redirect()->route('dk');
        }
        return view('admin.dangnhap');
    }
    public function register (Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            User::query()->create($data);
            return redirect()->route('login')->with('message','Đăng ký thành công');
        }
        return view('admin.dangky');
    }
    public function list(){
        $user=User::paginate();
        return view('admin.user.list',compact('user'));
    }
    public function updateNew(User $user, Request $request){

        $data= $request->except(['avatar']);
        $data['avatar'] = $user->avatar;
        if($request->isMethod('PUT')){
            
            if ($request->hasFile('avatar')) {
                $path_image = $request->file('avatar')->store('images','public');
                $data['avatar'] = $path_image;
            }
            
            $user->update($data);
            return redirect()->route('admin.update',['user'=>$user])->with('thongbao','cập nhật thành công');
        }
        
        return view('admin.user.update',compact('user'));
    }
    public function delete(User $user){
        if(Auth::user()->id==$user->id){
            return redirect()->route('admin.list')->with('error','bạn không thể xóa chính bạn');
        }
        $user->delete();
        return redirect()->route('admin.list')->with('thongbao','xóa thành công');
    }
    public function logout (){
        Auth::logout();
        return redirect()->route('login');
    }
}
