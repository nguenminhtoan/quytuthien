<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GayquyForm;

class TuthienController extends Controller
{
    
    public function index(){
        return view('tuthien.index');
    }
    
    public function show($id){
        return view('tuthien.show');
    }

    public function create() {
        return view('tuthien.create');
    }
    
    public function save(GayquyForm $request) {
        
    }
}
