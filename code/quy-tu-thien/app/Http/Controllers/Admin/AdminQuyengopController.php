<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quyengop;

class AdminQuyenGopController extends Controller
{
    //
    public function all(Request $request){
        $list = Quyengop::getlist(null, null, $request->offset ?? 1);
        return view('admin.quyengop.index', ['list' => $list]);
    }
    
    public function index($status){
        if ($status == 'confirm') {
            $status = true;
        } else {
            $status = false;
        }
        $list = Tuthien::getlist(null, $status, 10);
        return view('admin.quyengop.index', ['list' => $list]);
    }
}
