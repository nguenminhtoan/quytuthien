<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuyengopForm;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;
use App\Models\Quyengop;
use App\Models\Taikhoan;
use App\Models\Tuthien;
use App\Models\Nguoithamgia;
use Illuminate\Support\Facades\DB;
use Exception;
use Log;

class QuyengopController extends Controller
{
    //
    public function index($id){
        $detail = Tuthien::getdetail($id);
        return view("quyengop.index", ["id" => $id, 'detail' => $detail]);
    }
    
    public function create(QuyengopForm $request){
        try {
            
            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('ymdHis').'.'.$file->extension();
                Storage::disk('local')->putFileAs('image/'.$request->id, $file, $fileName);
                $link = Storage::disk('local')->path('image/'.$request->id.'/'.$fileName);
                $response = (new TesseractOCR($link))->run();
                $nhan = array_column(Taikhoan::getlist($request->id), "MA_TAIKHOAN");
                $info = $this->getinfotaikhoan($response, $request->taikhoan, $nhan);
                $check = $this->checkInfo($response, $request->taikhoan, $request->ten ?? $info[0], $nhan, $request->sotien, $request->thoigian, $info[1]);
                if (isset($request->sdt) || isset($request->email) ){
                    $thamgia = Nguoithamgia::checkmany($request->sdt, $request->email);
                    if (is_null($thamgia)) {
                        $new = new Nguoithamgia();
                        if ($request->sdt){
                            $new->sdt = DB::raw('MY_ENCR(\''.$request->sdt.'\')');
                        }
                        if ($request->email){
                            $new->email = DB::raw('MY_ENCR(\''.$request->email.'\')');
                        }
                        $new->hoten = DB::raw('MY_ENCR(\''.$info[0].'\')');
                        $new->ngaytao = date('Y/m/d H:i:s');
                        $new->save();
                        $thamgia = $new->id;
                    }
                }
                $new = new Quyengop();
                $new->id_tuthien = $request->id;
                $new->taikhoan = DB::raw('MY_ENCR(\''.$request->taikhoan.'\')');
                $new->ten = DB::raw('MY_ENCR(\''.$this->convert($request->ten).'\')');
                $new->nganhang = DB::raw('MY_ENCR(\''.$request->nganhang.'\')');
                if ($request->ten == "") {
                    $new->ten = DB::raw('MY_ENCR(\''.$info[0].'\')');
                }
                $new->magiaodich = $info[1];
                $new->id_thamgia = $thamgia ?? null;
                $new->noidung = $info[2];
                $new->sotien = $request->sotien;
                $new->thoigian = $request->thoigian;
                $new->xacthuc = $check;
                $new->hinhanh = 'image/'.$request->id.'/'.$fileName;
                $new->ngaytao = date('Y/m/d H:i:s');
                $new->save();
                
                $detail = Tuthien::getdetail($request->id);
                return view("quyengop.complete", ['xacnhan' => $check, 'detail' => $detail]);
            }
        } catch (Exception $e) {
            Log::error("code". $e->getCode(). "errors" . $e->getMessage());
        }
    }
    
    public function complete(){
    }
    
    private function checkInfo($text, $taikhoan, $hoten, $nhan, $sotien, $ngay, $magiaodich) {
        $arr = preg_split('/\r\n|\r|\n/', $text);
        $arrcheck = [false, false, false, false, false, false];
        $arrcheck[1] = is_null($hoten);
        foreach ($arr as $row){
            if (strlen(trim($row)) == 0) continue;
            if ($arrcheck[0] == false && strpos(str_replace(' ', '', $row), $taikhoan) !== false) {
                $arrcheck[0] = true;
            }
            if ($arrcheck[1] == false && $hoten != "" && strpos($this->convert($row), $this->convert($hoten)) !== false) {
                $arrcheck[1] = true;
            }
            if ($arrcheck[2] == false && strpos(implode(", ",$nhan), str_replace(' ', '', $row)) !== false) {
                $arrcheck[2] = true;
            }
            if ($arrcheck[3] == false && strpos(str_replace(',', '', $row), $sotien) !== false) {
                $arrcheck[3] = true;
            }
            $pattern = "/(\d{2})\/(\d{2})\/(\d{4})|(\d{2})-(\d{2})-(\d{4})|(\d{4})-(\d{2})-(\d{2})|(\d{4})\/(\d{2})\/(\d{2})/";
            preg_match($pattern, $row, $output_array);
            if ($arrcheck[4] == false && count($output_array) > 0 ) {
                $arr = preg_split('/\/|-/', $output_array[0]);
                if (strlen($arr[2]) > 3) {
                    $tu = date('Y-m-d', strtotime($arr[2].'-'.$arr[1].'-'.$arr[0]));
                } else {
                    $tu = date('Y-m-d', strtotime($output_array[0]));
                }
                $den = date('Y-m-d', strtotime($ngay));
                $arrcheck[4] = ($tu == $den);
            }
        }
        $arrcheck[5] = Quyengop::checkmany($taikhoan, $this->convert($hoten), $sotien, $ngay, $magiaodich);
        return $arrcheck[0] && $arrcheck[1] && $arrcheck[2] && $arrcheck[3] && $arrcheck[4] && $arrcheck[5];
    }
    
    public function getinfotaikhoan($text, $taikhoan, $nhan){
        $arr = preg_split('/\r\n|\r|\n/', $text);
        $arrcheck = ["","",""];
        foreach ($arr as $key=>$row){
            if (strlen(trim($row)) == 0) continue;
            if ($arrcheck[0] == "" && strpos(str_replace(' ', '', $row), $taikhoan) !== false) {
                $arrcheck[0] = $arr[$key-1];
            }
            if ($arrcheck[0] == "" && 
                    (preg_match('/TEN TAI K\wOAN/', $this->convert($row)) ||
                        preg_match('/TAI K\wOAN/', $this->convert($row)))) {
                $arrcheck[0] = $arr[$key+1];
            }
            
            if ($arrcheck[1] == "" && strpos(implode(", ",$nhan), str_replace(' ', '', $row)) == false
                    && preg_match("/MA GIAO DICH/", $this->convert($row))) {
                    $output_array = preg_split("/\s/", $row);
                    $count = count($output_array) - 1;
                    $arrcheck[1] = $output_array[$count];
        
            }
            if ($arrcheck[2] == "" && strpos(implode(", ",$nhan), str_replace(' ', '', $row)) == false
                    && preg_match("/N\wI DUNG/", $this->convert($row))) {
                    $arrcheck[2] = $row;
        
            }
        }
        return $arrcheck;
    }


    private function convert($str) {
      $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
      $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
      $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
      $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
      $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
      $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
      $str = preg_replace("/(đ)/", "d", $str);
      $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
      $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
      $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
      $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
      $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
      $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
      $str = preg_replace("/(Đ)/", "D", $str);
      return strtoupper($str);
  }
}
