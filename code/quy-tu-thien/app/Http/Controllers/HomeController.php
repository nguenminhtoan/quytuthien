<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuthien;
use Exception;
use Illuminate\Support\Facades\Log;
use thiagoalessio\TesseractOCR\TesseractOCR;

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
    
    public function demo(){
        return view("home.demo");
    }
    
    public function annotateImage(Request $request)
    {
        $this->main();
//        try {
//            if ($request->file('image')) {
//                $img = $request->file('image');
//                $name = "text.png";
//                $img->move(public_path('/images/'), $name);
//                $request = new TesseractOCR(public_path('/images/').$name);
//                $response = $request->run();
//
//                dd($response);
//            }
//        } catch (Exception $e) {
//            
//            echo json_encode(["code" => $e->getCode(), "errors" => $e->getMessage()]);
//        }
    }
    
    public function loginBank(){
        main();
    }
    

    /**
     * Hace login en la web enviando un POST con el usuario y contraseña.
     */
    private function login() {

        $URL = 'https://ebank.tpb.vn/gateway/api/auth/login';
        $user = '01280080';
        $pass = '1nV2o4YOj';

        $cookie_path = dirname(__FILE__) . '/cookie.txt';
        global $cookie_path;
        global $access_token;
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=' . $user . '&password=' . $pass);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $ret = curl_exec($ch);
        curl_close($ch);
        $access_token = json_decode($ret, true);
        return $ret ? true : null;
    }

    /**
     * Recupera una página html.
     */
    function get($url) {
        global $cookie_path;
        global $access_token;
        $ch = curl_init();
//        $postinfo = "debtorAccountNumber=01280080001&creditorAccountNumber=0111000265516&creditorBankId=970436";
//        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$access_token["access_token"],
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $html = curl_exec($ch);
        curl_close($ch);

        return $html;
    }

    /**
     * Parsea el html y retorna un array con todos los datos relevantes.
     */
    function parse($html) {
        // Se deja esta implementación como ejercicio para el lector.
    }
    
    private function getaccount(){
        $url = "https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v2/creditor-info/external/account-number";
        $postinfo = [
            "debtorAccountNumber"=> "01280080001",
            "creditorAccountNumber"=>"0111000261116",
            "creditorBankId"=>"970436"
        ];
        $postinfo = "debtorAccountNumber=01280080001&creditorAccountNumber=0111000265516&creditorBankId=970436";
        global $cookie_path;
        global $access_token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");
        curl_setopt ($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
        $headers = array(
            'Accept: application/json, text/plain, */*',
            'content-type: application/json',
            'Authorization: Bearer '.$access_token["access_token"],
            "Content-Length: ".strlen($postinfo),
//            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36',
//            "SOURCE_APP: HYDRO",
//            "PLATFORM_VERSION: 92",
//            "APP_VERSION: 1.3",
//            "DEVICE_ID: KI3sRaBcQIywAZMoH1eleKNooj5W6NDH3GWXuoJ7rw10i",
//            "PLATFORM_NAME: WEB",
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        $ret = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $html = json_decode($ret, true);
        curl_close($ch);
        dd($http_status);
    }

    /**
     * Crea un nodo a partir del contenido de $data
     */
    function create_node($data) {
        // guarda un nodo
        $node = (object) array(
                    'title' => 'Loren ipsum',
                    'body' => 'dolor sit amet'
        );
        $node = node_save($node);
        if (!$node->nid) {
            print "ERROR: error al crear un nodo para $data"; // TODO: $data se imprimirá como 'Array'
        }
        // lo asocia a una tax
        taxonomy_node_save($node, array($tax1, $tax2, $tax3));
    }

    function Curl($url, $post_data, $http_status, $header = null) {
//        Log::debug("Curl $url JsonData=" . $post_data);

        $ch=curl_init();
        global $cookie_path;
        global $access_token;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        // post_data
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
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
    
    /**
     *
     */
    function main() {
        if (!$this->login()) {
            print "ERROR: no pude hacer login.\n";
            exit;
        }
//        $url = 'https://ebank.tpb.vn/gateway/api/customers-presentation-service/v1/customers';
//        $url = "https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v1/contact-info";
//        $url="https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v1/contact-info?contactTypes=INTERBANK_ACCT";
//        t = {method: "post", url: "device-presentation-service/v1/device/register"
//        
        $url = "https://ebank.tpb.vn/gateway/api/fund-transfer-presentation-service/v2/creditor-info/external/account-number";
//        $html = $this->get($url);
        $postinfo = [
            "debtorAccountNumber"=> "01280080001",
            "creditorAccountNumber"=>"0111011265516",
            "creditorBankId"=>"970436"
        ];
        $http_status = 200;
        $hearder = [];
        $html = $this->Curl($url, $postinfo, $http_status, $hearder);
        dd($html);
//        $data = $this->parse($html);
    }

}
