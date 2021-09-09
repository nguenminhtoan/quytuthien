<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Nganhang;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ApiInfobankController extends Controller
{
    //
    public function index(Request $request){
        $taikhoan = Bank::select(
                DB::raw("MY_DECR(user) as user"),
                DB::raw("MY_DECR(taikhoan) as taikhoan"), 
                DB::raw("MY_DECR(nguoidung) as nguoidung"))->where("ID", "100")->first();
        if($this->loginBank($taikhoan->user, $taikhoan->taikhoan)){
            $response = $this->getAccount($taikhoan->nguoidung, $request->taikhoan, $request->bankid);
            return json_decode($response);
        }
        return json_decode("{code: 0, message: 'lỗi hệ thống'}");
    }
    
    public function bank(){
        $bank = Nganhang::select("ID_NGANHANG as VALUE", "TENFULL as TEXT")->get();
        return json_decode($bank);
    }

    
    public function convertToinfo(Request $request){
        $file = $request->file("file");
        $name = "temp.".$file->extension();
        Storage::disk('local')->putFileAs('tempfile', $file, $name);
        $link = Storage::disk('local')->path('tempfile/'.$name);
        $response = (new TesseractOCR($link))->run();
        $string =$this->convert($response);
        $arr = preg_split('/\r\n|\r|\n/', $string);
        $list = array_filter($arr,function($a){return trim($a)!=="";});
        $curentcy = preg_replace('/[A-Za-z\.\,\-\s]/', '', preg_grep("/([0-9]+[,.][0-9]+)/", $list));
        foreach($list as $key => $item){
            $list[$key] = str_replace(' ', '', $item);
            $list[$key] = preg_replace('/[A-Za-z\.]/', ' ', $list[$key]);
        }
        $list = preg_grep("/\d{7,16}/", $list);
        return ['sotien' => array_pop($curentcy), "taikhoan" => array_shift($list)];
    }

    private function loginBank($user, $pass){
        $url = 'https://ebank.tpb.vn/gateway/api/auth/login';
        $cookie_path = dirname(__FILE__) . '/cookie.txt';
        global $cookie_path;
        global $access_token;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=' . $user . '&password=' . $pass);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $ret = curl_exec($ch);
        curl_close($ch);
        $access_token = json_decode($ret, true);
        return $ret ? true : false;
    }
    
    private function getAccount($userNumber, $accountNumber, $bankId){
        $url = "https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v2/creditor-info/external/account-number";
        $url_intenal = "https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v1/creditor-info/internal";
        $ch=curl_init();
        global $cookie_path;
        global $access_token;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $postinfo = [
            "debtorAccountNumber"=> $userNumber,
            "creditorAccountNumber"=>$accountNumber,
            "creditorBankId"=>$bankId
        ];
        $postintenal = [
            "creditorAccountNumber"=>$accountNumber
        ];
                
        if ($bankId == '000001') {
            curl_setopt($ch, CURLOPT_URL, $url_intenal);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postintenal));
        }else{
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postinfo));
        }
        // post_data
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postinfo));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
        $header = [];
        if (!is_null($header)) {
            curl_setopt($ch, CURLOPT_HEADER, true);
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$access_token["access_token"],
            );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $body = null;
        // error
        if (!$response) {
            $body = curl_error($ch);
            // HostNotFound, No route to Host, etc  Network related error
            $http_status = -1;
        } else {
           //parsing http status code
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if (!is_null($header)) {
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

                $header = substr($response, 0, $header_size);
                $body = substr($response, $header_size);
            } else {
                $body = $response;
            }
        }
        curl_close($ch);
        return $body;
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
