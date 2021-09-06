<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginForm;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    
    public function auth(LoginForm $request){
        if (Auth::guard('admin')->attempt(['id_nguoidung' => $request->taikhoan])) {
            // Authentication passed...
            return redirect('/admin');
        }
        else {
            dd("thất bại");
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
    
    protected function guard()
    {
        return Auth::guard('guard-name');
    }
    
    
}
