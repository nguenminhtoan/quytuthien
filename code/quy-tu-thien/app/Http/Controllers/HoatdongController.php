<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuthien;
use App\Models\Hoatdong;

class HoatdongController extends Controller
{
    public function index($id){
        $detail = Tuthien::getdetail($id);
        $list = Hoatdong::getlist($id);
        return view('hoatdong.index', ['detail' => $detail, 'list' => $list]);
    }
    
    public function show($id){
        $hoatdong = Hoatdong::getdetail($id);
        $detail = Tuthien::getdetail($hoatdong->ID_TUTHIEN);
        return view('hoatdong.show', ['detail' =>$detail, 'hoatdong' => $hoatdong]);
    }
}
