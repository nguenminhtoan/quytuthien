<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginForm;
use Illuminate\Support\Facades\Auth;
use App\Models\Nguoidung;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    
    public function auth(LoginForm $request){
        $user = Nguoidung::authcheck($request->taikhoan);
        if ($user && Hash::check($request->matkhau, $user->MATKHAU)) {
            // Authentication passed...
            Auth::guard('admin')->attempt(['ID_NGUOIDUNG' => $user->ID_NGUOIDUNG, 'MATKHAU' => $user->ID_NGUOIDUNG]);
            $a = Auth::user();
            dd($a);
            return redirect('/admin');
        }
        else {
            dd($check);
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
