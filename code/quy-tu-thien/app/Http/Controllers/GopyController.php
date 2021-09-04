<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GopyForm;
use App\Models\Gopy;

class GopyController extends Controller
{
    public function index(){
        return view("gopy.index");
    }
    
    public function save(GopyForm $request){
        
        return view("gopy.index");
    }
}
