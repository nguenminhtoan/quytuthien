<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;
use Exception;

class HomeController extends Controller
{
    public function index(){
        return view("home.index");
    }
    
    
    /**
     * annotate Image
     *
     * @param Request $request
     */
    public function annotateImage(Request $request)
    {
        try {
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = 
                Storage::disk('local')->put($file, 'Contents');
                $name = "text.png";
                $img->move(public_path('/images/'), $name);
                $request = new TesseractOCR(public_path('/images/').$name);
                $response = $request->run();

                echo $response;
            }
        } catch (Exception $e) {
            echo json_encode(["code" => $e->getCode(), "errors" => $e->getMessage()]);
        }
    }
}
