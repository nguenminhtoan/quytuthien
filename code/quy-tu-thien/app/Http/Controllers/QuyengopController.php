<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Quyengop;

class QuyengopController extends Controller
{
    //
    public function index($id){
        return view("quyengop.index", ["id" => $id]);
    }
    
    public function create(Quyengop $request){
        
        return redirect('quyen-gop/'. $request->id);
    }
}
