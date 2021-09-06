<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tuthien;

class AdminTuthienController extends Controller
{
    //
    public function all(Request $request){
        $list = Tuthien::getlist(null, null, $request->offset ?? 1);
        return view('admin.tuthien.index', ['list' => $list]);
    }
    
    public function index($status){
        if ($status == 'confirm') {
            $status = true;
        } else {
            $status = false;
        }
        $list = Tuthien::getlist(null, $status, 10);
        return view('admin.tuthien.index', ['list' => $list]);
    }
}
