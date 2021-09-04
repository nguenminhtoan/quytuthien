<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuthien;
use App\Models\Quyengop;

class SaokeController extends Controller
{
    //
    public function index($id) {
        $detail = Tuthien::getdetail($id);
        $list = Quyengop::getlist($id);
        return view("saoke.index", ["detail" => $detail, 'list' => $list]);
    }
}
