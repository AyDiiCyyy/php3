<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserContronller extends Controller
{
    public function dk(Request $request){
        if($request->isMethod('POST')){
            User::query()->create($request->all());
            return redirect()->route('dn')->with('message', 'Đăng ký thành công');
        }
        return view('dangky');
    }
    public function dn(Request $request){
        if($request->isMethod('POST')){
            $fl=true;
            $data = $request->only(['username', 'password']);
            // dd($data);
            if (Auth::attemptWhen($data,function($user) use (&$fl){
                
                if ($user->active==1){
                    
                    return true;
                }else{
                    $fl=false;
                    return false;
                }
            })) {
                return redirect()->route('thongtin');
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
        return view('dangnhap');
    }
    public function update(Request $request){
        $data = Auth::user();
        $us = User::query()->find($data->id);
        $dulieu= $request->except(['avatar']);
        $dulieu['avatar'] = $data->avatar;
        if($request->isMethod('PUT')){
            
            if ($request->hasFile('avatar')) {
                $path_image = $request->file('avatar')->store('images','public');
                $dulieu['avatar'] = $path_image;
            }
            
            $us->update($dulieu);
            return redirect()->route('update')->with('thongbao','Sửa thông tin thành công');
        }
        // dd($data);
        return view('update',compact('data'));
    }
    public function thongtin(){
        $data = Auth::user();
        
        // dd($data);
        return view('thongtin',compact('data'));
    }
    public function dangxuat(){
        $data = Auth::logout();
        // dd($data);
        return redirect()->route('dn');
    }
    public function doimk(Request $request){
        $data= Auth::user();
        if($request->isMethod('PUT')){
            if(Auth::attempt([
                'username'=>$data->username,
                'password'=> $request->passol
            ])){
                User::query()->where('id',$data->id)->update(['password'=>Hash::make($request->password)]);
                return redirect()->route('dn')->with('message', 'Đổi mật khẩu thành công');
            }else{
                return redirect()->back()->with('message', 'Đổi mật khẩu thất bại');
            }
        }
        return view('doimk');
    }
    public function list(){
        $user=User::paginate();
        return view('admin.list',compact('user'));
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
        
        return view('admin.update',compact('user'));
    }
    public function delete(User $user){
        $user->delete();
        return redirect()->route('admin.list')->with('thongbao','xóa thành công');
    }
}
