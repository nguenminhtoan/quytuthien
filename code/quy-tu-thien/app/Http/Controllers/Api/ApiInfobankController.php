<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class ApiInfobankController extends Controller
{
    //
    public function index(Request $request){
        $taikhoan = Bank::select(
                DB::raw("DECR(user) as user"),
                DB::raw("DECR(taikhoan) as taikhoan"), 
                DB::raw("DECR(nguoidung) as nguoidung"))->first();
////        if($this->loginBank($taikhoan->user, $taikhoan->taikhoan)){
//            $response = $this->getAccount($taikhoan->nguoidung, $request->taikhoan, $request->bankid);
//            return json_decode($response);
//        }
        return json_decode("{code: 0, message: 'lỗi hệ thống'}");
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
        $ch=curl_init();
        global $cookie_path;
        global $access_token;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $postinfo = [
            "debtorAccountNumber"=> $userNumber,
            "creditorAccountNumber"=>$accountNumber,
            "creditorBankId"=>$bankId
        ];
        // post_data
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postinfo));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);

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
}
