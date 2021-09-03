<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GayquyForm;
use App\Models\Tuthien;

class TuthienController extends Controller
{
    
    public function index(){
        $list = Tuthien::getlist();
        return view('tuthien.index', ['list' => $list]);
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
