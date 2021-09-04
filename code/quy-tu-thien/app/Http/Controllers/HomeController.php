<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuthien;
use Exception;

class HomeController extends Controller
{
    public function index(){
        $list = Tuthien::getlist();
        $listhost = Tuthien::getlisthot();
        return view("home.index", ['listhost' => $listhost, 'list' => $list]);
    }
    
    
    /**
     * annotate Image
     *
     * @param Request $request
     */
    public function about()
    {
        return view("home.about");
    }
}
