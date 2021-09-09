<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuthien;
use Exception;
use Illuminate\Support\Facades\Log;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\DB;
use App\Models\Quyengop;
use Illuminate\Support\Facades\Storage;

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
//        $string =  '[{"en_name":"Joint Stock Commercial Bank for Foreign Trade of Vietnam","vn_name":"Ngân hàng TMCP Ngoại Thương","bankId":"970436","bicCode":"BFTVVNVN","atmBin":"970436","cardLength":0,"shortName":"Vietcombank, VCB","bankCode":"203","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng TMCP Ngoại Thương (Vietcombank, VCB)"},{"en_name":"Vietnam Technological and Commercial Joint stock Bank","vn_name":"Ngân hàng Kỹ thương Việt Nam","bankId":"970407","atmBin":"970407","cardLength":16,"shortName":"Techcombank, TCB","bankCode":"310","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kỹ thương Việt Nam (Techcombank, TCB)"},{"en_name":"Bank for Investment and Development of Vietnam","vn_name":"Ngân hàng Đầu tư và Phát triển Việt Nam","bankId":"970418","bicCode":"BIDVVNVN","atmBin":"970418","cardLength":16,"shortName":"BIDV","bankCode":"202","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Đầu tư và Phát triển Việt Nam (BIDV)"},{"en_name":"An Binh Commercial Joint stock  Bank","vn_name":"Ngân hàng An Bình","bankId":"970425","atmBin":"970425","cardLength":16,"shortName":"ABBank","bankCode":"323","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng An Bình (ABBank)"},{"en_name":"Asia Commercial Bank","vn_name":"Ngân hàng Á Châu","bankId":"970416","bicCode":"ASCBVNVN","atmBin":"970416","cardLength":0,"shortName":"ACB","bankCode":"307","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Á Châu (ACB)"},{"en_name":"Vienam Bank for Agriculture and Rural Development","vn_name":"Ngân hàng NN & PTNT VN","bankId":"970405","bicCode":"VBAAVNVN","atmBin":"970499","cardLength":16,"shortName":"Agribank, VBARD","bankCode":"204","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng NN & PTNT VN (Agribank, VBARD)"},{"en_name":"ANZ Bank","vn_name":"Ngân hàng ANZ Việt Nam","cardLength":0,"shortName":"ANZ","bankCode":"602","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng ANZ Việt Nam (ANZ)"},{"en_name":"BANGKOK  BANK","vn_name":"BANGKOK  BANK","cardLength":0,"shortName":"BANGKOK  BANK","bankCode":"612","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANGKOK  BANK (BANGKOK  BANK)"},{"en_name":"VietNam national Financial switching Joint Stock Company","vn_name":"Công ty cổ phần chuyển mạch tài chính quốc gia Việt Nam","cardLength":0,"shortName":"Banknetvn","bankCode":"401","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Công ty cổ phần chuyển mạch tài chính quốc gia Việt Nam (Banknetvn)"},{"en_name":"Baoviet Joint Stock Commercial Bank","vn_name":"Ngân hàng TMCP Bảo Việt","bankId":"970438","atmBin":"970438","cardLength":20,"shortName":"Baoviet Bank","bankCode":"359","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Bảo Việt (Baoviet Bank)"},{"en_name":"BANK OF CHINA","vn_name":"BANK OF CHINA","cardLength":0,"shortName":"BC","bankCode":"620","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF CHINA (BC)"},{"en_name":"Bank for investment and development of Cambodia HCMC","vn_name":"NH ĐT&PT Campuchia CN HCM","cardLength":0,"shortName":"BIDC HCM","bankCode":"648","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH ĐT&PT Campuchia CN HCM (BIDC HCM)"},{"en_name":"Bank for investment and development of Cambodia HN","vn_name":"NH ĐT&PT Campuchia CN Hà Nội","cardLength":0,"shortName":"BIDC HN","bankCode":"638","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH ĐT&PT Campuchia CN Hà Nội (BIDC HN)"},{"en_name":"Bank of Paris and the Netherlands HCMC","vn_name":"BNP Paribas Bank HCM","cardLength":0,"shortName":"BNP Paribas HCM","bankCode":"614","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BNP Paribas Bank HCM (BNP Paribas HCM)"},{"en_name":"BNP Paribas Ha Noi","vn_name":"Ngan hang BNP Paribas CN Ha Noi","cardLength":0,"shortName":"BNP Paribas HN","bankCode":"657","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngan hang BNP Paribas CN Ha Noi (BNP Paribas HN)"},{"en_name":"Bank of Communications","vn_name":"Bank of Communications","cardLength":0,"shortName":"BOC","bankCode":"615","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Bank of Communications (BOC)"},{"en_name":"Bank of India","vn_name":"Ngân hàng Bank of India","cardLength":0,"shortName":"BOI","bankCode":"659","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Bank of India (BOI)"},{"en_name":"NH BPCEIOM HCMC","vn_name":"Ngân hàng BPCEIOM CN  TP Hồ Chí Minh","cardLength":0,"shortName":"BPCEICOM","bankCode":"601","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng BPCEIOM CN  TP Hồ Chí Minh (BPCEICOM)"},{"en_name":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM","vn_name":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM","cardLength":0,"shortName":"BTMU HCM","bankCode":"622","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM (BTMU HCM)"},{"en_name":"BANK OF TOKYO - MITSUBISHI UFJ - HN","vn_name":"BANK OF TOKYO - MITSUBISHI UFJ - HN","cardLength":0,"shortName":"BTMU HN","bankCode":"653","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF TOKYO - MITSUBISHI UFJ - HN (BTMU HN)"},{"en_name":"Credit Agricole Corporate and Investment Bank","vn_name":"Credit Agricole Corporate and Investment Bank","cardLength":0,"shortName":"CACIB","bankCode":"621","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Credit Agricole Corporate and Investment Bank (CACIB)"},{"en_name":"Commonwealth Bank of Australia","vn_name":"Commonwealth Bank of Australia","cardLength":0,"shortName":"CBA","bankCode":"643","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Commonwealth Bank of Australia (CBA)"},{"en_name":"Vietnam Construction Bank","vn_name":"NH TMCP Xây dựng Việt Nam","bankId":"970444","atmBin":"970444","cardLength":0,"shortName":"CBB","bankCode":"339","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TMCP Xây dựng Việt Nam (CBB)"},{"en_name":"China Construction Bank Corporation","vn_name":"China Construction Bank Corporation","cardLength":0,"shortName":"CCBC","bankCode":"611","napasSupported":false,"status":"C","channel":"IBFT","displayName":"China Construction Bank Corporation (CCBC)"},{"en_name":"CTTC Quoc Te Chailease HSC","vn_name":"CTTC Quoc Te Chailease HSC","cardLength":0,"shortName":"Chailease","bankCode":"820","napasSupported":false,"status":"C","channel":"IBFT","displayName":"CTTC Quoc Te Chailease HSC (Chailease)"},{"en_name":"The Chase Manhattan Bank","vn_name":"The Chase Manhattan Bank","cardLength":0,"shortName":"CHASE","bankCode":"627","napasSupported":false,"status":"C","channel":"IBFT","displayName":"The Chase Manhattan Bank (CHASE)"},{"en_name":"CIMB Bank Vietnam Limited","vn_name":"Ngân hàng TNHH MTV CIMB Việt Nam","bankId":"422589","atmBin":"422589","cardLength":0,"shortName":"CIMB","bankCode":"661","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV CIMB Việt Nam (CIMB)"},{"en_name":"CitiBank HCM","vn_name":"Citi Bank TP HCM","cardLength":0,"shortName":"CitibankHCM","bankCode":"654","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Citi Bank TP HCM (CitibankHCM)"},{"en_name":"Citibank Ha Noi","vn_name":"Citi Bank Ha Noi","cardLength":0,"shortName":"CitibankHN","bankCode":"605","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Citi Bank Ha Noi (CitibankHN)"},{"en_name":"Co-Operation Bank of Viet Nam","vn_name":"Ngân hàng Hợp tác Việt Nam","cardLength":0,"shortName":"COOPBANK","bankCode":"901","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Hợp tác Việt Nam (COOPBANK)"},{"en_name":"The ChinaTrust Commercial Bank HCMC","vn_name":"Ngân hàng CTBC CN TP Hồ Chí Minh","cardLength":0,"shortName":"CTBC","bankCode":"629","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng CTBC CN TP Hồ Chí Minh (CTBC)"},{"en_name":"Cathay United Bank","vn_name":"Ngân hàng Cathay","cardLength":0,"shortName":"CTU","bankCode":"634","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Cathay (CTU)"},{"en_name":"DEUTSCHE BANK","vn_name":"DEUTSCHE BANK","cardLength":0,"shortName":"DB","bankCode":"619","napasSupported":false,"status":"C","channel":"IBFT","displayName":"DEUTSCHE BANK (DB)"},{"en_name":"DBS Bank Ltd","vn_name":"DBS Bank Ltd","cardLength":0,"shortName":"DBS","bankCode":"650","napasSupported":false,"status":"C","channel":"IBFT","displayName":"DBS Bank Ltd (DBS)"},{"en_name":"The Development Bank of Singapore Limited","vn_name":"DBS chi nhánh Thành phố Hồ Chí Minh","bankId":"796500","atmBin":"796500","cardLength":16,"shortName":"DBS","bankCode":"650","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"DBS chi nhánh Thành phố Hồ Chí Minh (DBS)"},{"en_name":"Dong A Commercial Joint stock Bank","vn_name":"Ngân hàng Đông Á","bankId":"970406","atmBin":"970406","cardLength":16,"shortName":"Dong A Bank, DAB","bankCode":"304","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Đông Á (Dong A Bank, DAB)"},{"en_name":"Vietnam Export Import Commercial Joint Stock Bank","vn_name":"Ngân hàng Xuất nhập khẩu Việt Nam","bankId":"970431","atmBin":"970431","cardLength":16,"shortName":"Eximbank, EIB","bankCode":"305","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Xuất nhập khẩu Việt Nam (Eximbank, EIB)"},{"en_name":"First Commercial Bank","vn_name":"First Commercial Bank","cardLength":0,"shortName":"FCNB","bankCode":"630","napasSupported":false,"status":"C","channel":"IBFT","displayName":"First Commercial Bank (FCNB)"},{"en_name":"First Commercial Bank Ha Noi","vn_name":"First Commercial Bank Ha Noi","cardLength":0,"shortName":"FCNB HN","bankCode":"608","napasSupported":false,"status":"C","channel":"IBFT","displayName":"First Commercial Bank Ha Noi (FCNB HN)"},{"en_name":"Global Petro Commercial Joint Stock Bank","vn_name":"Ngân hàng Dầu khí Toàn cầu","bankId":"970408","atmBin":"970408","cardLength":20,"shortName":"GP Bank","bankCode":"320","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Dầu khí Toàn cầu (GP Bank)"},{"en_name":"Housing Development Bank","vn_name":"Ngân hàng Phát triển TP HCM","bankId":"970437","atmBin":"970437","cardLength":20,"shortName":"HDBank","bankCode":"321","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Phát triển TP HCM (HDBank)"},{"en_name":"Hong Leong Bank Viet Nam","vn_name":"Ngân hàng Hong Leong Viet Nam","bankId":"970442","atmBin":"970442","cardLength":20,"shortName":"HLO","bankCode":"603","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Hong Leong Viet Nam (HLO)"},{"en_name":"Hua Nan Commercial Bank","vn_name":"Hua Nan Commercial Bank","cardLength":0,"shortName":"HNCB","bankCode":"640","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Hua Nan Commercial Bank (HNCB)"},{"en_name":"The HongKong and Shanghai Banking Corporation","vn_name":"NH TNHH Một Thành Viên HSBC Việt Nam","cardLength":0,"shortName":"HSBC","bankCode":"617","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH TNHH Một Thành Viên HSBC Việt Nam (HSBC)"},{"en_name":"The HongKong and Shanghai Banking Corporation","vn_name":"NH TNHH Một Thành Viên HSBC Việt Nam","bankId":"458761","atmBin":"458761","cardLength":0,"shortName":"HSBC","bankCode":"617","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TNHH Một Thành Viên HSBC Việt Nam (HSBC)"},{"en_name":"NH The Hongkong and Shanghai","vn_name":"Ngân hàng The Hongkong và Thượng Hải","cardLength":0,"shortName":"HSBC HN","bankCode":"645","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng The Hongkong và Thượng Hải (HSBC HN)"},{"en_name":"Industrial Bank of Korea","vn_name":"Industrial Bank of Korea","bankId":"970455","atmBin":"970455","cardLength":0,"shortName":"IBK","bankCode":"641","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Industrial Bank of Korea (IBK)"},{"en_name":"Industrial Bank of Korea TP HCM","vn_name":"Ngân hàng Industrial Bank of Korea- Chi nhánh Thành phố Hồ Chí Minh","bankId":"970456","atmBin":"970456","cardLength":0,"shortName":"IBK HCM","bankCode":"641","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Industrial Bank of Korea- Chi nhánh Thành phố Hồ Chí Minh (IBK HCM)"},{"en_name":"ICB of China CN Ha Noi","vn_name":"ICB of China CN Ha Noi","cardLength":0,"shortName":"ICB","bankCode":"649","napasSupported":false,"status":"C","channel":"IBFT","displayName":"ICB of China CN Ha Noi (ICB)"},{"en_name":"Indovina Bank","vn_name":"Indovina Bank","bankId":"970434","atmBin":"888999","cardLength":0,"shortName":"IVB","bankCode":"502","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Indovina Bank (IVB)"},{"en_name":"Kookmin Bank","vn_name":"Ngân hàng Kookmin – Chi nhánh Hà Nội","bankId":"970462","atmBin":"970462","cardLength":0,"shortName":"KBHN","bankCode":"631","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kookmin – Chi nhánh Hà Nội (KBHN)"},{"en_name":"Kho Bac Nha Nuoc","vn_name":"Kho Bạc Nhà Nước","cardLength":0,"shortName":"KBNN","bankCode":"701","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Kho Bạc Nhà Nước (KBNN)"},{"en_name":"Korea Exchange Bank","vn_name":"Korea Exchange Bank","cardLength":0,"shortName":"KEB","bankCode":"626","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Korea Exchange Bank (KEB)"},{"en_name":"Kien Long Commercial Joint Stock Bank","vn_name":"Ngân hàng Kiên Long","bankId":"970452","atmBin":"970452","cardLength":16,"shortName":"Kienlongbank","bankCode":"353","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kiên Long (Kienlongbank)"},{"en_name":"Kookmin Bank","vn_name":"Ngân hàng Kookmin","cardLength":0,"shortName":"KMB","bankCode":"631","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Kookmin (KMB)"},{"en_name":"Lien Viet Post Bank","vn_name":"Ngan hàng TMCP Bưu điện Liên Việt","bankId":"970449","atmBin":"970449","cardLength":0,"shortName":"Lienvietbank,  LPB","bankCode":"357","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngan hàng TMCP Bưu điện Liên Việt (Lienvietbank,  LPB)"},{"en_name":"Maritime Bank","vn_name":"Ngân hàng Hàng Hải Việt Nam","bankId":"970426","atmBin":"970426","cardLength":16,"shortName":"Maritime Bank, MSB","bankCode":"302","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Hàng Hải Việt Nam (Maritime Bank, MSB)"},{"en_name":"Maybank","vn_name":"Malayan Banking Berhad","cardLength":0,"shortName":"Maybank","bankCode":"609","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Malayan Banking Berhad (Maybank)"},{"en_name":"Military Commercial Joint stock Bank","vn_name":"Ngân hàng Quân Đội","bankId":"970422","bicCode":"MSCBVNVN","atmBin":"970422","cardLength":16,"shortName":"MB","bankCode":"311","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Quân Đội (MB)"},{"en_name":"Malayan Banking Berhad","vn_name":"Malayan Banking Berhad","cardLength":0,"shortName":"MBB","bankCode":"635","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Malayan Banking Berhad (MBB)"},{"en_name":"Mizuho Corporate Bank - TP HCM","vn_name":"Mizuho Corporate Bank - TP HCM","cardLength":0,"shortName":"MCB_HCM","bankCode":"639","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mizuho Corporate Bank - TP HCM (MCB_HCM)"},{"en_name":"Mega ICBC Bank","vn_name":"Mega ICBC Bank","cardLength":0,"shortName":"MICB","bankCode":"623","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mega ICBC Bank (MICB)"},{"en_name":"Mizuho Bank","vn_name":"Mizuho Corporate Bank","cardLength":0,"shortName":"Mizuho Bank","bankCode":"613","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mizuho Corporate Bank (Mizuho Bank)"},{"en_name":"Nam A Commercial Joint stock Bank","vn_name":"Ngân hàng Nam Á","bankId":"970428","atmBin":"970428","cardLength":0,"shortName":"Nam A Bank, NAB","bankCode":"306","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Nam Á (Nam A Bank, NAB)"},{"en_name":"North Asia Commercial Joint Stock Bank","vn_name":"Ngân hàng Bắc Á","bankId":"970409","atmBin":"970409","cardLength":0,"shortName":"NASBank, NASB","bankCode":"313","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Bắc Á (NASBank, NASB)"},{"en_name":"National Citizen Bank","vn_name":"Ngân hàng Quoc Dan","bankId":"970419","atmBin":"970419","cardLength":16,"shortName":"NCB","bankCode":"352","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Quoc Dan (NCB)"},{"en_name":"NongHyup Bank Hanoi Branch","vn_name":"Ngân hàng Nonghyup – Chi nhánh Hà Nội","bankId":"801011","atmBin":"801011","cardLength":0,"shortName":"NHB HN","bankCode":"662","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Nonghyup – Chi nhánh Hà Nội (NHB HN)"},{"en_name":"Oversea - Chinese Banking Corporation","vn_name":"Oversea - Chinese Bank","cardLength":0,"shortName":"OCBC","bankCode":"625","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Oversea - Chinese Bank (OCBC)"},{"en_name":"Ocean Bank","vn_name":"Ngân hàng Đại Dương","bankId":"970414","atmBin":"970414","cardLength":20,"shortName":"Ocean Bank","bankCode":"319","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Đại Dương (Ocean Bank)"},{"en_name":"Orient Commercial Joint Stock Bank","vn_name":"Ngân hàng Phương Đông","bankId":"970448","atmBin":"970448","cardLength":16,"shortName":"Oricombank, OCB, PhuongDong Bank","bankCode":"333","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Phương Đông (Oricombank, OCB, PhuongDong Bank)"},{"en_name":"Petrolimex group commercial Joint stock Bank","vn_name":"Ngân hàng Xăng dầu Petrolimex","bankId":"970430","atmBin":"970430","cardLength":16,"shortName":"PG Bank","bankCode":"341","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Xăng dầu Petrolimex (PG Bank)"},{"en_name":"PVcombank","vn_name":"NH TMCP Đại Chúng Viet Nam","bankId":"970412","atmBin":"970412","cardLength":16,"shortName":"PVcombank","bankCode":"360","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TMCP Đại Chúng Viet Nam (PVcombank)"},{"en_name":"Quy tin dung co so","vn_name":"Quỹ tín dụng cơ sở","cardLength":0,"shortName":"QTDCS","bankCode":"902","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Quỹ tín dụng cơ sở (QTDCS)"},{"en_name":"Saigon Thuong Tin Commercial Joint Stock Bank","vn_name":"Ngân hàng Sài Gòn Thương Tín","bankId":"970403","atmBin":"970403","cardLength":16,"shortName":"Sacombank","bankCode":"303","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn Thương Tín (Sacombank)"},{"en_name":"Saigon Bank for Industry and Trade","vn_name":"Ngân hàng Sài Gòn Công Thương","bankId":"970400","atmBin":"161087","cardLength":16,"shortName":"Saigonbank","bankCode":"308","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn Công Thương (Saigonbank)"},{"en_name":"State Bank of Vietnam","vn_name":"Ngân Hàng Nhà Nước","cardLength":0,"shortName":"SBV","bankCode":"101","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân Hàng Nhà Nước (SBV)"},{"en_name":"Saigon Commercial Joint Stock Bank","vn_name":"Ngân hàng TMCP Sài Gòn","bankId":"970429","atmBin":"970429","cardLength":16,"shortName":"SCB","bankCode":"334","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Sài Gòn (SCB)"},{"en_name":"Standard Chartered Bank HN","vn_name":"Ngân hàng Standard Chartered Bank HN","cardLength":0,"shortName":"SCBank HN","bankCode":"646","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Standard Chartered Bank HN (SCBank HN)"},{"en_name":"The Shanghai Commercial & Savings Bank CN Dong Nai","vn_name":"The Shanghai Commercial & Savings Bank CN Đồng Nai","cardLength":0,"shortName":"SCSB","bankCode":"606","napasSupported":false,"status":"C","channel":"IBFT","displayName":"The Shanghai Commercial & Savings Bank CN Đồng Nai (SCSB)"},{"en_name":"Standard Chartered Bank","vn_name":"Ngân hàng TNHH MTV Standard Chartered Việt Nam","bankId":"970410","atmBin":"970410","cardLength":0,"shortName":"SCVN","bankCode":"604","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV Standard Chartered Việt Nam (SCVN)"},{"en_name":"South East Asia Commercial Joint stock  Bank","vn_name":"Ngân hàng TMCP Đông Nam Á","bankId":"970440","atmBin":"970468","cardLength":16,"shortName":"SeABank","bankCode":"317","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Đông Nam Á (SeABank)"},{"en_name":"Saigon - Hanoi Commercial Joint Stock Bank","vn_name":"Ngân hàng Sài Gòn - Hà Nội","bankId":"970443","atmBin":"970443","cardLength":16,"shortName":"SHB","bankCode":"348","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn - Hà Nội (SHB)"},{"en_name":"Shinhan Bank","vn_name":"Ngân hàng TNHH MTV Shinhan Việt Nam","bankId":"970424","atmBin":"970424","cardLength":0,"shortName":"Shinhan Bank","bankCode":"616","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV Shinhan Việt Nam (Shinhan Bank)"},{"en_name":"The Siam Commercial Public Bank","vn_name":"Ngân hàng The Siam Commercial Public","cardLength":0,"shortName":"SIAM","bankCode":"600","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng The Siam Commercial Public (SIAM)"},{"en_name":"Sumitomo Mitsui Banking Corporation HCMC","vn_name":"Sumitomo Mitsui Banking Corporation HCM","cardLength":0,"shortName":"SMBC","bankCode":"636","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Sumitomo Mitsui Banking Corporation HCM (SMBC)"},{"en_name":"Sumitomo Mitsui Banking Corporation HN","vn_name":"Sumitomo Mitsui Banking Corporation HN","cardLength":0,"shortName":"SMBC HN","bankCode":"936","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Sumitomo Mitsui Banking Corporation HN (SMBC HN)"},{"en_name":"SinoPac Bank","vn_name":"Ngân hàng SinoPac","cardLength":0,"shortName":"SPB","bankCode":"632","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng SinoPac (SPB)"},{"en_name":"Taipei Fubon Commercial Bank Ha Noi","vn_name":"Taipei Fubon Commercial Bank Ha Noi","cardLength":0,"shortName":"TFCBHN","bankCode":"642","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Taipei Fubon Commercial Bank Ha Noi (TFCBHN)"},{"en_name":"Taipei Fubon Commercial Bank TP Ho Chi Minh","vn_name":"Taipei Fubon Commercial Bank TP Ho Chi Minh","cardLength":0,"shortName":"TFCBTPHCM","bankCode":"651","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Taipei Fubon Commercial Bank TP Ho Chi Minh (TFCBTPHCM)"},{"en_name":"United Oversea Bank","vn_name":"United Oversea Bank","bankId":"970458","atmBin":"970458","cardLength":0,"shortName":"UOB","bankCode":"618","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"United Oversea Bank (UOB)"},{"en_name":"Vietnam Bank for Social Policies","vn_name":"Ngân hàng Chính sách xã hội Việt Nam","cardLength":0,"shortName":"VBSP","bankCode":"207","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Chính sách xã hội Việt Nam (VBSP)"},{"en_name":"Vietnam Development Bank","vn_name":"Ngân hàng Phát triển Việt Nam","cardLength":0,"shortName":"VDB","bankCode":"208","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Phát triển Việt Nam (VDB)"},{"en_name":"Vietnam International Commercial Joint Stock Bank","vn_name":"Ngân hàng Quốc tế","bankId":"970441","atmBin":"970441","cardLength":0,"shortName":"VIBank, VIB","bankCode":"314","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Quốc tế (VIBank, VIB)"},{"en_name":"VID public","vn_name":"Ngân hàng VID Public","bankId":"970439","atmBin":"970439","cardLength":16,"shortName":"VID public","bankCode":"501","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng VID Public (VID public)"},{"en_name":"Ngan hang Viet Hoa","vn_name":"Ngân hàng Việt Hoa","cardLength":0,"shortName":"Viet Hoa Bank","bankCode":"324","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Việt Hoa (Viet Hoa Bank)"},{"en_name":"Viet A Commercial Joint Stock Bank","vn_name":"Ngân hàng Việt Á","bankId":"970427","atmBin":"970427","cardLength":0,"shortName":"VietA Bank, VAB","bankCode":"355","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Việt Á (VietA Bank, VAB)"},{"en_name":"Vietnam Thương tin Commercial Joint Stock Bank","vn_name":"Ngân hàng Việt Nam Thương Tín","bankId":"970433","atmBin":"970433","cardLength":16,"shortName":"Vietbank","bankCode":"356","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Việt Nam Thương Tín (Vietbank)"},{"en_name":"BanViet Commercial Jont stock Bank","vn_name":"NHTMCP Bản Việt","bankId":"970454","atmBin":"970454","cardLength":16,"shortName":"VietCapital Bank","bankCode":"327","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NHTMCP Bản Việt (VietCapital Bank)"},{"en_name":"Vietnam Joint Stock Commercial Bank for Industry and Trade","vn_name":"Ngân hàng công thương Việt Nam","bankId":"970415","atmBin":"970415","cardLength":16,"shortName":"Vietinbank","bankCode":"201","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng công thương Việt Nam (Vietinbank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng","bankId":"970432","atmBin":"970432","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng (VPBank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank","bankId":"546035","atmBin":"546035","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank (VPBank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank","bankId":"546034","atmBin":"546034","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank (VPBank)"},{"en_name":"Vietnam - Russia Bank","vn_name":"Ngân hàng Liên doanh Việt Nga","bankId":"970421","atmBin":"970421","cardLength":16,"shortName":"VRB","bankCode":"505","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Liên doanh Việt Nga (VRB)"},{"en_name":"Ngan hang Vung Tau","vn_name":"Ngân hàng Vũng Tàu","cardLength":0,"shortName":"Vung Tau","bankCode":"315","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Vũng Tàu (Vung Tau)"},{"en_name":"Woori BANK HCMC","vn_name":"NH Woori HCM","cardLength":0,"shortName":"WHHCM","bankCode":"637","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH Woori HCM (WHHCM)"},{"en_name":"WOORI BANK Hanoi","vn_name":"WOORI BANK Hà Nội","bankId":"970457","atmBin":"970457","cardLength":0,"shortName":"WHHN","bankCode":"624","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"WOORI BANK Hà Nội (WHHN)"}]';
//        $arr = json_decode($string);
//        foreach($arr as $item){
//            if (isset($item->bankId)){
//                DB::insert("insert into nganhang(ID_NGANHANG, TENFULL, TEN) values(?,?,?)", [$item->bankId, $item->vn_name, $item->shortName]);
//            }
//        }
//        return "xong";
        try {
            if ($request->file('image')) {
                $listimg = $request->file('image');
                $json = [];
                $string = "";
                $image = array();
                foreach($listimg as $key => $img) {
                    $name = date("Ymdhis").".jpg";
                    $temp = $key."_temp.jpg";
                    Storage::disk('local')->putFileAs('image/1000000005', $img, $name);
                    array_push($image, '/image/'.$temp);
                    $link = Storage::disk('local')->path('image/1000000005/'.$name);
                    copy($link, public_path('/image/'). $temp);
                    $request = new TesseractOCR($link);
                    $response = $request->run();
                    $this->convertArray($response, 'image/1000000005/'.$name,$json);
                    $string .= $response;
                }

                return view("home.confirm", ["list" => $json, "html" => $string, 'listimg' => $image]);
            }
        } catch (Exception $e) {
            
            echo json_encode(["code" => $e->getCode(), "errors" => $e->getMessage()]);
        }
    }
    
    
    public function save(Request $request){
        $list = $request->taikhoan;
        DB::beginTransaction();
        try {
            foreach ($list as $key => $item) {
                if ($item["taikhoan"] == "") {
                    continue;
                }
                $new = new Quyengop();

                $new->thoigian = $item["thoigian"];
                $new->taikhoan = DB::raw("('" . trim($item["taikhoan"]) . "')");
                $new->sotien = $item["sotien"];
                $new->id_tuthien = 1000000005;
                $new->hinhanh = $item["hinhanh"];
                $new->xacthuc = true;
                $new->ngaytao = date("Y-m-d");
                $new->save();
            }
        DB::commit();
            
            return redirect("/");
        } catch (Exception $e) {
            DB::rollback();
        }
    }


    private function convertArray(&$string, $image, &$arr){
        $string = str_replace("$", "5", $string);
        $string = str_replace("'", "", $string);
        $string = str_replace("+", "", $string);
        $string = str_replace("s0", "50", $string);
//        $string = preg_replace("/\.|\,|\|/", "", $string);
//        $string = preg_replace("/[A-Za-z]/", "", $string);
//        $string = preg_replace("/\.|\,/", "", $string);
        $data = preg_split('/\r\n|\r|\n|(\s\|\s)|(\s\}\s)/', $string);
        $data = array_filter($data);
        $data = array_filter($data, function($a) {
            return trim($a) !== "" && strlen($a) > 2;
        });
        $list = [];
        foreach($data as $item) {
            if (preg_match("/[0-9]{1,3}[,.][0-9]{1,3}|[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $item)){
                $list = array_merge($list, preg_split("/\s/",$item));
            } else{
                array_push($list, $item);
            }
        }
        $list1 = array_values(preg_grep("/([a-z0-9]{4}[,.][0-9]{3,7})|([0-9]{9,14}|([a-z]{3,4}[,.][a-z]{4,6}))/", $list));
        $list2 = array_values(preg_grep("/([0-9]{2}\/[0-9]{2}\/[0-9]{4})|([0-9]{2}\/[0-9]{2}7[0-9]{4})|([0-9]{4,6}2020)/", $list));
        $list3 = array_values(preg_grep("/(^([a-z0-9]{1,3}[,.][0-9]{1,3}))|^([0-9]{1,5})$|^([a-zA-Z0-9]{3})$/", $list));
        foreach($list1 as $key => $item){
            $item = (int)preg_replace("/\.|\,|\s/", "", $item);
            if (isset($list3[$key])){
                $sotien = (int)preg_replace("/\.|\,|\s/", "", $list3[$key]);
                if ($sotien == 0) {
                    $sotien = 100000;
                } else if ($sotien < 1000) {
                    $sotien = $sotien * 1000;
                } else if ($sotien < 10000) {
                    $sotien = $sotien * 100;
                } 
            } else{
                $sotien = 0;
            }
            if (isset($list2[$key])){
                $date = trim($list2[$key]);
            }
            array_push($arr, 
                [
                    "thoigian" => substr($date, -4)."-".substr($date,3,2)."-".substr($date,0,2),
                    "taikhoan" => $item,
                    "sotien" => $sotien,
                    "hinhanh" => $image
                ]);
        }
        return $arr;
    }
//        dd([$arr,$string]);
//        $list = array_slice($list, 0);
//        $a = array_slice($list,0);
//        $check=0;
//        $key = 0;
//        while($key < count($a))
//        {
//            if (strpos($a[$key], "/") !== false ){
//                $check=$key;
//            }
//            $key++;
//        }
//        $check += 2;
//        $list1= array_chunk(array_slice($list, 0, $check),2);
//        $list2= array_slice(array_filter(array_map('trim', array_slice($list, $check))), 0);
//        
////        dd([$list, $list1, $list2]);
////        $arr= [];
//        foreach($list1 as $key=>$item) {
//            if (count($item) == 2){
//                if (isset($list2[$key])){
//                    $sotien = (int)$list2[$key];
//                    if ((int)$list2[$key] == 0) {
//                        $sotien = 100000;
//                    } else if ((int)$list2[$key] < 1000) {
//                        $sotien = (int)$list2[$key] * 1000;
//                    } else if ((int)$list2[$key] < 10000) {
//                        $sotien = (int)$list2[$key] * 100;
//                    } 
//                } else{
//                    if (strpos($item[1], " ") !== false) {
//                        $sotk = explode(" ",trim($item[1]));
//                        $sotien = isset($sotk[1]) ? $sotk[1] : 0;
//                        $item[1] = $sotk[0];
//                    } else {
//                        $sotien = 0;
//                    }
//                }
//                $date = trim($item[0]);
//                array_push($arr, 
//                    [
//                        "thoigian" => substr($date, -4)."-".substr($date,3,2)."-".substr($date,0,2),
//                        "taikhoan" => $item[1],
//                        "sotien" => $sotien,
//                        "hinhanh" => $image
//                    ]);
//                $new = new Quyengop();
//                $date = explode("/", $item[0]);
//                $new->thoigian= substr($item[0], -4)."-".substr($item[0],3,2)."-".substr($item[0],0,2);
//                $new->taikhoan= DB::raw("('".$item[1]."')");
//                $new->sotien= $sotien;
//                $new->id_tuthien = 1000000005;
//                $new->hinhanh = $image;
//                $new->xacthuc = true;
//                $new->ngaytao = date("Y-m-d");
//                $new->save();
//            }
//        }
        
//        $new = new Nguoidung($arr);
//        $new->save();
//        return $arr;
//    }

    public function loginBank(){
        $string =  '[{"en_name":"Joint Stock Commercial Bank for Foreign Trade of Vietnam","vn_name":"Ngân hàng TMCP Ngoại Thương","bankId":"970436","bicCode":"BFTVVNVN","atmBin":"970436","cardLength":0,"shortName":"Vietcombank, VCB","bankCode":"203","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng TMCP Ngoại Thương (Vietcombank, VCB)"},{"en_name":"Vietnam Technological and Commercial Joint stock Bank","vn_name":"Ngân hàng Kỹ thương Việt Nam","bankId":"970407","atmBin":"970407","cardLength":16,"shortName":"Techcombank, TCB","bankCode":"310","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kỹ thương Việt Nam (Techcombank, TCB)"},{"en_name":"Bank for Investment and Development of Vietnam","vn_name":"Ngân hàng Đầu tư và Phát triển Việt Nam","bankId":"970418","bicCode":"BIDVVNVN","atmBin":"970418","cardLength":16,"shortName":"BIDV","bankCode":"202","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Đầu tư và Phát triển Việt Nam (BIDV)"},{"en_name":"An Binh Commercial Joint stock  Bank","vn_name":"Ngân hàng An Bình","bankId":"970425","atmBin":"970425","cardLength":16,"shortName":"ABBank","bankCode":"323","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng An Bình (ABBank)"},{"en_name":"Asia Commercial Bank","vn_name":"Ngân hàng Á Châu","bankId":"970416","bicCode":"ASCBVNVN","atmBin":"970416","cardLength":0,"shortName":"ACB","bankCode":"307","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Á Châu (ACB)"},{"en_name":"Vienam Bank for Agriculture and Rural Development","vn_name":"Ngân hàng NN & PTNT VN","bankId":"970405","bicCode":"VBAAVNVN","atmBin":"970499","cardLength":16,"shortName":"Agribank, VBARD","bankCode":"204","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng NN & PTNT VN (Agribank, VBARD)"},{"en_name":"ANZ Bank","vn_name":"Ngân hàng ANZ Việt Nam","cardLength":0,"shortName":"ANZ","bankCode":"602","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng ANZ Việt Nam (ANZ)"},{"en_name":"BANGKOK  BANK","vn_name":"BANGKOK  BANK","cardLength":0,"shortName":"BANGKOK  BANK","bankCode":"612","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANGKOK  BANK (BANGKOK  BANK)"},{"en_name":"VietNam national Financial switching Joint Stock Company","vn_name":"Công ty cổ phần chuyển mạch tài chính quốc gia Việt Nam","cardLength":0,"shortName":"Banknetvn","bankCode":"401","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Công ty cổ phần chuyển mạch tài chính quốc gia Việt Nam (Banknetvn)"},{"en_name":"Baoviet Joint Stock Commercial Bank","vn_name":"Ngân hàng TMCP Bảo Việt","bankId":"970438","atmBin":"970438","cardLength":20,"shortName":"Baoviet Bank","bankCode":"359","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Bảo Việt (Baoviet Bank)"},{"en_name":"BANK OF CHINA","vn_name":"BANK OF CHINA","cardLength":0,"shortName":"BC","bankCode":"620","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF CHINA (BC)"},{"en_name":"Bank for investment and development of Cambodia HCMC","vn_name":"NH ĐT&PT Campuchia CN HCM","cardLength":0,"shortName":"BIDC HCM","bankCode":"648","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH ĐT&PT Campuchia CN HCM (BIDC HCM)"},{"en_name":"Bank for investment and development of Cambodia HN","vn_name":"NH ĐT&PT Campuchia CN Hà Nội","cardLength":0,"shortName":"BIDC HN","bankCode":"638","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH ĐT&PT Campuchia CN Hà Nội (BIDC HN)"},{"en_name":"Bank of Paris and the Netherlands HCMC","vn_name":"BNP Paribas Bank HCM","cardLength":0,"shortName":"BNP Paribas HCM","bankCode":"614","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BNP Paribas Bank HCM (BNP Paribas HCM)"},{"en_name":"BNP Paribas Ha Noi","vn_name":"Ngan hang BNP Paribas CN Ha Noi","cardLength":0,"shortName":"BNP Paribas HN","bankCode":"657","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngan hang BNP Paribas CN Ha Noi (BNP Paribas HN)"},{"en_name":"Bank of Communications","vn_name":"Bank of Communications","cardLength":0,"shortName":"BOC","bankCode":"615","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Bank of Communications (BOC)"},{"en_name":"Bank of India","vn_name":"Ngân hàng Bank of India","cardLength":0,"shortName":"BOI","bankCode":"659","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Bank of India (BOI)"},{"en_name":"NH BPCEIOM HCMC","vn_name":"Ngân hàng BPCEIOM CN  TP Hồ Chí Minh","cardLength":0,"shortName":"BPCEICOM","bankCode":"601","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng BPCEIOM CN  TP Hồ Chí Minh (BPCEICOM)"},{"en_name":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM","vn_name":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM","cardLength":0,"shortName":"BTMU HCM","bankCode":"622","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF TOKYO - MITSUBISHI UFJ - TP HCM (BTMU HCM)"},{"en_name":"BANK OF TOKYO - MITSUBISHI UFJ - HN","vn_name":"BANK OF TOKYO - MITSUBISHI UFJ - HN","cardLength":0,"shortName":"BTMU HN","bankCode":"653","napasSupported":false,"status":"C","channel":"IBFT","displayName":"BANK OF TOKYO - MITSUBISHI UFJ - HN (BTMU HN)"},{"en_name":"Credit Agricole Corporate and Investment Bank","vn_name":"Credit Agricole Corporate and Investment Bank","cardLength":0,"shortName":"CACIB","bankCode":"621","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Credit Agricole Corporate and Investment Bank (CACIB)"},{"en_name":"Commonwealth Bank of Australia","vn_name":"Commonwealth Bank of Australia","cardLength":0,"shortName":"CBA","bankCode":"643","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Commonwealth Bank of Australia (CBA)"},{"en_name":"Vietnam Construction Bank","vn_name":"NH TMCP Xây dựng Việt Nam","bankId":"970444","atmBin":"970444","cardLength":0,"shortName":"CBB","bankCode":"339","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TMCP Xây dựng Việt Nam (CBB)"},{"en_name":"China Construction Bank Corporation","vn_name":"China Construction Bank Corporation","cardLength":0,"shortName":"CCBC","bankCode":"611","napasSupported":false,"status":"C","channel":"IBFT","displayName":"China Construction Bank Corporation (CCBC)"},{"en_name":"CTTC Quoc Te Chailease HSC","vn_name":"CTTC Quoc Te Chailease HSC","cardLength":0,"shortName":"Chailease","bankCode":"820","napasSupported":false,"status":"C","channel":"IBFT","displayName":"CTTC Quoc Te Chailease HSC (Chailease)"},{"en_name":"The Chase Manhattan Bank","vn_name":"The Chase Manhattan Bank","cardLength":0,"shortName":"CHASE","bankCode":"627","napasSupported":false,"status":"C","channel":"IBFT","displayName":"The Chase Manhattan Bank (CHASE)"},{"en_name":"CIMB Bank Vietnam Limited","vn_name":"Ngân hàng TNHH MTV CIMB Việt Nam","bankId":"422589","atmBin":"422589","cardLength":0,"shortName":"CIMB","bankCode":"661","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV CIMB Việt Nam (CIMB)"},{"en_name":"CitiBank HCM","vn_name":"Citi Bank TP HCM","cardLength":0,"shortName":"CitibankHCM","bankCode":"654","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Citi Bank TP HCM (CitibankHCM)"},{"en_name":"Citibank Ha Noi","vn_name":"Citi Bank Ha Noi","cardLength":0,"shortName":"CitibankHN","bankCode":"605","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Citi Bank Ha Noi (CitibankHN)"},{"en_name":"Co-Operation Bank of Viet Nam","vn_name":"Ngân hàng Hợp tác Việt Nam","cardLength":0,"shortName":"COOPBANK","bankCode":"901","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Hợp tác Việt Nam (COOPBANK)"},{"en_name":"The ChinaTrust Commercial Bank HCMC","vn_name":"Ngân hàng CTBC CN TP Hồ Chí Minh","cardLength":0,"shortName":"CTBC","bankCode":"629","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng CTBC CN TP Hồ Chí Minh (CTBC)"},{"en_name":"Cathay United Bank","vn_name":"Ngân hàng Cathay","cardLength":0,"shortName":"CTU","bankCode":"634","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Cathay (CTU)"},{"en_name":"DEUTSCHE BANK","vn_name":"DEUTSCHE BANK","cardLength":0,"shortName":"DB","bankCode":"619","napasSupported":false,"status":"C","channel":"IBFT","displayName":"DEUTSCHE BANK (DB)"},{"en_name":"DBS Bank Ltd","vn_name":"DBS Bank Ltd","cardLength":0,"shortName":"DBS","bankCode":"650","napasSupported":false,"status":"C","channel":"IBFT","displayName":"DBS Bank Ltd (DBS)"},{"en_name":"The Development Bank of Singapore Limited","vn_name":"DBS chi nhánh Thành phố Hồ Chí Minh","bankId":"796500","atmBin":"796500","cardLength":16,"shortName":"DBS","bankCode":"650","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"DBS chi nhánh Thành phố Hồ Chí Minh (DBS)"},{"en_name":"Dong A Commercial Joint stock Bank","vn_name":"Ngân hàng Đông Á","bankId":"970406","atmBin":"970406","cardLength":16,"shortName":"Dong A Bank, DAB","bankCode":"304","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Đông Á (Dong A Bank, DAB)"},{"en_name":"Vietnam Export Import Commercial Joint Stock Bank","vn_name":"Ngân hàng Xuất nhập khẩu Việt Nam","bankId":"970431","atmBin":"970431","cardLength":16,"shortName":"Eximbank, EIB","bankCode":"305","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Xuất nhập khẩu Việt Nam (Eximbank, EIB)"},{"en_name":"First Commercial Bank","vn_name":"First Commercial Bank","cardLength":0,"shortName":"FCNB","bankCode":"630","napasSupported":false,"status":"C","channel":"IBFT","displayName":"First Commercial Bank (FCNB)"},{"en_name":"First Commercial Bank Ha Noi","vn_name":"First Commercial Bank Ha Noi","cardLength":0,"shortName":"FCNB HN","bankCode":"608","napasSupported":false,"status":"C","channel":"IBFT","displayName":"First Commercial Bank Ha Noi (FCNB HN)"},{"en_name":"Global Petro Commercial Joint Stock Bank","vn_name":"Ngân hàng Dầu khí Toàn cầu","bankId":"970408","atmBin":"970408","cardLength":20,"shortName":"GP Bank","bankCode":"320","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Dầu khí Toàn cầu (GP Bank)"},{"en_name":"Housing Development Bank","vn_name":"Ngân hàng Phát triển TP HCM","bankId":"970437","atmBin":"970437","cardLength":20,"shortName":"HDBank","bankCode":"321","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Phát triển TP HCM (HDBank)"},{"en_name":"Hong Leong Bank Viet Nam","vn_name":"Ngân hàng Hong Leong Viet Nam","bankId":"970442","atmBin":"970442","cardLength":20,"shortName":"HLO","bankCode":"603","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Hong Leong Viet Nam (HLO)"},{"en_name":"Hua Nan Commercial Bank","vn_name":"Hua Nan Commercial Bank","cardLength":0,"shortName":"HNCB","bankCode":"640","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Hua Nan Commercial Bank (HNCB)"},{"en_name":"The HongKong and Shanghai Banking Corporation","vn_name":"NH TNHH Một Thành Viên HSBC Việt Nam","cardLength":0,"shortName":"HSBC","bankCode":"617","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH TNHH Một Thành Viên HSBC Việt Nam (HSBC)"},{"en_name":"The HongKong and Shanghai Banking Corporation","vn_name":"NH TNHH Một Thành Viên HSBC Việt Nam","bankId":"458761","atmBin":"458761","cardLength":0,"shortName":"HSBC","bankCode":"617","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TNHH Một Thành Viên HSBC Việt Nam (HSBC)"},{"en_name":"NH The Hongkong and Shanghai","vn_name":"Ngân hàng The Hongkong và Thượng Hải","cardLength":0,"shortName":"HSBC HN","bankCode":"645","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng The Hongkong và Thượng Hải (HSBC HN)"},{"en_name":"Industrial Bank of Korea","vn_name":"Industrial Bank of Korea","bankId":"970455","atmBin":"970455","cardLength":0,"shortName":"IBK","bankCode":"641","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Industrial Bank of Korea (IBK)"},{"en_name":"Industrial Bank of Korea TP HCM","vn_name":"Ngân hàng Industrial Bank of Korea- Chi nhánh Thành phố Hồ Chí Minh","bankId":"970456","atmBin":"970456","cardLength":0,"shortName":"IBK HCM","bankCode":"641","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Industrial Bank of Korea- Chi nhánh Thành phố Hồ Chí Minh (IBK HCM)"},{"en_name":"ICB of China CN Ha Noi","vn_name":"ICB of China CN Ha Noi","cardLength":0,"shortName":"ICB","bankCode":"649","napasSupported":false,"status":"C","channel":"IBFT","displayName":"ICB of China CN Ha Noi (ICB)"},{"en_name":"Indovina Bank","vn_name":"Indovina Bank","bankId":"970434","atmBin":"888999","cardLength":0,"shortName":"IVB","bankCode":"502","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Indovina Bank (IVB)"},{"en_name":"Kookmin Bank","vn_name":"Ngân hàng Kookmin – Chi nhánh Hà Nội","bankId":"970462","atmBin":"970462","cardLength":0,"shortName":"KBHN","bankCode":"631","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kookmin – Chi nhánh Hà Nội (KBHN)"},{"en_name":"Kho Bac Nha Nuoc","vn_name":"Kho Bạc Nhà Nước","cardLength":0,"shortName":"KBNN","bankCode":"701","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Kho Bạc Nhà Nước (KBNN)"},{"en_name":"Korea Exchange Bank","vn_name":"Korea Exchange Bank","cardLength":0,"shortName":"KEB","bankCode":"626","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Korea Exchange Bank (KEB)"},{"en_name":"Kien Long Commercial Joint Stock Bank","vn_name":"Ngân hàng Kiên Long","bankId":"970452","atmBin":"970452","cardLength":16,"shortName":"Kienlongbank","bankCode":"353","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Kiên Long (Kienlongbank)"},{"en_name":"Kookmin Bank","vn_name":"Ngân hàng Kookmin","cardLength":0,"shortName":"KMB","bankCode":"631","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Kookmin (KMB)"},{"en_name":"Lien Viet Post Bank","vn_name":"Ngan hàng TMCP Bưu điện Liên Việt","bankId":"970449","atmBin":"970449","cardLength":0,"shortName":"Lienvietbank,  LPB","bankCode":"357","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngan hàng TMCP Bưu điện Liên Việt (Lienvietbank,  LPB)"},{"en_name":"Maritime Bank","vn_name":"Ngân hàng Hàng Hải Việt Nam","bankId":"970426","atmBin":"970426","cardLength":16,"shortName":"Maritime Bank, MSB","bankCode":"302","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Hàng Hải Việt Nam (Maritime Bank, MSB)"},{"en_name":"Maybank","vn_name":"Malayan Banking Berhad","cardLength":0,"shortName":"Maybank","bankCode":"609","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Malayan Banking Berhad (Maybank)"},{"en_name":"Military Commercial Joint stock Bank","vn_name":"Ngân hàng Quân Đội","bankId":"970422","bicCode":"MSCBVNVN","atmBin":"970422","cardLength":16,"shortName":"MB","bankCode":"311","type":"ACC","napasSupported":true,"status":"A","channel":"ACH","displayName":"Ngân hàng Quân Đội (MB)"},{"en_name":"Malayan Banking Berhad","vn_name":"Malayan Banking Berhad","cardLength":0,"shortName":"MBB","bankCode":"635","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Malayan Banking Berhad (MBB)"},{"en_name":"Mizuho Corporate Bank - TP HCM","vn_name":"Mizuho Corporate Bank - TP HCM","cardLength":0,"shortName":"MCB_HCM","bankCode":"639","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mizuho Corporate Bank - TP HCM (MCB_HCM)"},{"en_name":"Mega ICBC Bank","vn_name":"Mega ICBC Bank","cardLength":0,"shortName":"MICB","bankCode":"623","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mega ICBC Bank (MICB)"},{"en_name":"Mizuho Bank","vn_name":"Mizuho Corporate Bank","cardLength":0,"shortName":"Mizuho Bank","bankCode":"613","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Mizuho Corporate Bank (Mizuho Bank)"},{"en_name":"Nam A Commercial Joint stock Bank","vn_name":"Ngân hàng Nam Á","bankId":"970428","atmBin":"970428","cardLength":0,"shortName":"Nam A Bank, NAB","bankCode":"306","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Nam Á (Nam A Bank, NAB)"},{"en_name":"North Asia Commercial Joint Stock Bank","vn_name":"Ngân hàng Bắc Á","bankId":"970409","atmBin":"970409","cardLength":0,"shortName":"NASBank, NASB","bankCode":"313","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Bắc Á (NASBank, NASB)"},{"en_name":"National Citizen Bank","vn_name":"Ngân hàng Quoc Dan","bankId":"970419","atmBin":"970419","cardLength":16,"shortName":"NCB","bankCode":"352","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Quoc Dan (NCB)"},{"en_name":"NongHyup Bank Hanoi Branch","vn_name":"Ngân hàng Nonghyup – Chi nhánh Hà Nội","bankId":"801011","atmBin":"801011","cardLength":0,"shortName":"NHB HN","bankCode":"662","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Nonghyup – Chi nhánh Hà Nội (NHB HN)"},{"en_name":"Oversea - Chinese Banking Corporation","vn_name":"Oversea - Chinese Bank","cardLength":0,"shortName":"OCBC","bankCode":"625","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Oversea - Chinese Bank (OCBC)"},{"en_name":"Ocean Bank","vn_name":"Ngân hàng Đại Dương","bankId":"970414","atmBin":"970414","cardLength":20,"shortName":"Ocean Bank","bankCode":"319","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Đại Dương (Ocean Bank)"},{"en_name":"Orient Commercial Joint Stock Bank","vn_name":"Ngân hàng Phương Đông","bankId":"970448","atmBin":"970448","cardLength":16,"shortName":"Oricombank, OCB, PhuongDong Bank","bankCode":"333","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Phương Đông (Oricombank, OCB, PhuongDong Bank)"},{"en_name":"Petrolimex group commercial Joint stock Bank","vn_name":"Ngân hàng Xăng dầu Petrolimex","bankId":"970430","atmBin":"970430","cardLength":16,"shortName":"PG Bank","bankCode":"341","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Xăng dầu Petrolimex (PG Bank)"},{"en_name":"PVcombank","vn_name":"NH TMCP Đại Chúng Viet Nam","bankId":"970412","atmBin":"970412","cardLength":16,"shortName":"PVcombank","bankCode":"360","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NH TMCP Đại Chúng Viet Nam (PVcombank)"},{"en_name":"Quy tin dung co so","vn_name":"Quỹ tín dụng cơ sở","cardLength":0,"shortName":"QTDCS","bankCode":"902","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Quỹ tín dụng cơ sở (QTDCS)"},{"en_name":"Saigon Thuong Tin Commercial Joint Stock Bank","vn_name":"Ngân hàng Sài Gòn Thương Tín","bankId":"970403","atmBin":"970403","cardLength":16,"shortName":"Sacombank","bankCode":"303","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn Thương Tín (Sacombank)"},{"en_name":"Saigon Bank for Industry and Trade","vn_name":"Ngân hàng Sài Gòn Công Thương","bankId":"970400","atmBin":"161087","cardLength":16,"shortName":"Saigonbank","bankCode":"308","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn Công Thương (Saigonbank)"},{"en_name":"State Bank of Vietnam","vn_name":"Ngân Hàng Nhà Nước","cardLength":0,"shortName":"SBV","bankCode":"101","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân Hàng Nhà Nước (SBV)"},{"en_name":"Saigon Commercial Joint Stock Bank","vn_name":"Ngân hàng TMCP Sài Gòn","bankId":"970429","atmBin":"970429","cardLength":16,"shortName":"SCB","bankCode":"334","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Sài Gòn (SCB)"},{"en_name":"Standard Chartered Bank HN","vn_name":"Ngân hàng Standard Chartered Bank HN","cardLength":0,"shortName":"SCBank HN","bankCode":"646","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Standard Chartered Bank HN (SCBank HN)"},{"en_name":"The Shanghai Commercial & Savings Bank CN Dong Nai","vn_name":"The Shanghai Commercial & Savings Bank CN Đồng Nai","cardLength":0,"shortName":"SCSB","bankCode":"606","napasSupported":false,"status":"C","channel":"IBFT","displayName":"The Shanghai Commercial & Savings Bank CN Đồng Nai (SCSB)"},{"en_name":"Standard Chartered Bank","vn_name":"Ngân hàng TNHH MTV Standard Chartered Việt Nam","bankId":"970410","atmBin":"970410","cardLength":0,"shortName":"SCVN","bankCode":"604","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV Standard Chartered Việt Nam (SCVN)"},{"en_name":"South East Asia Commercial Joint stock  Bank","vn_name":"Ngân hàng TMCP Đông Nam Á","bankId":"970440","atmBin":"970468","cardLength":16,"shortName":"SeABank","bankCode":"317","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TMCP Đông Nam Á (SeABank)"},{"en_name":"Saigon - Hanoi Commercial Joint Stock Bank","vn_name":"Ngân hàng Sài Gòn - Hà Nội","bankId":"970443","atmBin":"970443","cardLength":16,"shortName":"SHB","bankCode":"348","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Sài Gòn - Hà Nội (SHB)"},{"en_name":"Shinhan Bank","vn_name":"Ngân hàng TNHH MTV Shinhan Việt Nam","bankId":"970424","atmBin":"970424","cardLength":0,"shortName":"Shinhan Bank","bankCode":"616","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng TNHH MTV Shinhan Việt Nam (Shinhan Bank)"},{"en_name":"The Siam Commercial Public Bank","vn_name":"Ngân hàng The Siam Commercial Public","cardLength":0,"shortName":"SIAM","bankCode":"600","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng The Siam Commercial Public (SIAM)"},{"en_name":"Sumitomo Mitsui Banking Corporation HCMC","vn_name":"Sumitomo Mitsui Banking Corporation HCM","cardLength":0,"shortName":"SMBC","bankCode":"636","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Sumitomo Mitsui Banking Corporation HCM (SMBC)"},{"en_name":"Sumitomo Mitsui Banking Corporation HN","vn_name":"Sumitomo Mitsui Banking Corporation HN","cardLength":0,"shortName":"SMBC HN","bankCode":"936","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Sumitomo Mitsui Banking Corporation HN (SMBC HN)"},{"en_name":"SinoPac Bank","vn_name":"Ngân hàng SinoPac","cardLength":0,"shortName":"SPB","bankCode":"632","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng SinoPac (SPB)"},{"en_name":"Taipei Fubon Commercial Bank Ha Noi","vn_name":"Taipei Fubon Commercial Bank Ha Noi","cardLength":0,"shortName":"TFCBHN","bankCode":"642","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Taipei Fubon Commercial Bank Ha Noi (TFCBHN)"},{"en_name":"Taipei Fubon Commercial Bank TP Ho Chi Minh","vn_name":"Taipei Fubon Commercial Bank TP Ho Chi Minh","cardLength":0,"shortName":"TFCBTPHCM","bankCode":"651","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Taipei Fubon Commercial Bank TP Ho Chi Minh (TFCBTPHCM)"},{"en_name":"United Oversea Bank","vn_name":"United Oversea Bank","bankId":"970458","atmBin":"970458","cardLength":0,"shortName":"UOB","bankCode":"618","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"United Oversea Bank (UOB)"},{"en_name":"Vietnam Bank for Social Policies","vn_name":"Ngân hàng Chính sách xã hội Việt Nam","cardLength":0,"shortName":"VBSP","bankCode":"207","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Chính sách xã hội Việt Nam (VBSP)"},{"en_name":"Vietnam Development Bank","vn_name":"Ngân hàng Phát triển Việt Nam","cardLength":0,"shortName":"VDB","bankCode":"208","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Phát triển Việt Nam (VDB)"},{"en_name":"Vietnam International Commercial Joint Stock Bank","vn_name":"Ngân hàng Quốc tế","bankId":"970441","atmBin":"970441","cardLength":0,"shortName":"VIBank, VIB","bankCode":"314","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Quốc tế (VIBank, VIB)"},{"en_name":"VID public","vn_name":"Ngân hàng VID Public","bankId":"970439","atmBin":"970439","cardLength":16,"shortName":"VID public","bankCode":"501","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng VID Public (VID public)"},{"en_name":"Ngan hang Viet Hoa","vn_name":"Ngân hàng Việt Hoa","cardLength":0,"shortName":"Viet Hoa Bank","bankCode":"324","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Việt Hoa (Viet Hoa Bank)"},{"en_name":"Viet A Commercial Joint Stock Bank","vn_name":"Ngân hàng Việt Á","bankId":"970427","atmBin":"970427","cardLength":0,"shortName":"VietA Bank, VAB","bankCode":"355","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Việt Á (VietA Bank, VAB)"},{"en_name":"Vietnam Thương tin Commercial Joint Stock Bank","vn_name":"Ngân hàng Việt Nam Thương Tín","bankId":"970433","atmBin":"970433","cardLength":16,"shortName":"Vietbank","bankCode":"356","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Việt Nam Thương Tín (Vietbank)"},{"en_name":"BanViet Commercial Jont stock Bank","vn_name":"NHTMCP Bản Việt","bankId":"970454","atmBin":"970454","cardLength":16,"shortName":"VietCapital Bank","bankCode":"327","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"NHTMCP Bản Việt (VietCapital Bank)"},{"en_name":"Vietnam Joint Stock Commercial Bank for Industry and Trade","vn_name":"Ngân hàng công thương Việt Nam","bankId":"970415","atmBin":"970415","cardLength":16,"shortName":"Vietinbank","bankCode":"201","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng công thương Việt Nam (Vietinbank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng","bankId":"970432","atmBin":"970432","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng (VPBank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank","bankId":"546035","atmBin":"546035","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank (VPBank)"},{"en_name":"Vietnam prosperity Joint stock commercial Bank","vn_name":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank","bankId":"546034","atmBin":"546034","cardLength":16,"shortName":"VPBank","bankCode":"309","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank (VPBank)"},{"en_name":"Vietnam - Russia Bank","vn_name":"Ngân hàng Liên doanh Việt Nga","bankId":"970421","atmBin":"970421","cardLength":16,"shortName":"VRB","bankCode":"505","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"Ngân hàng Liên doanh Việt Nga (VRB)"},{"en_name":"Ngan hang Vung Tau","vn_name":"Ngân hàng Vũng Tàu","cardLength":0,"shortName":"Vung Tau","bankCode":"315","napasSupported":false,"status":"C","channel":"IBFT","displayName":"Ngân hàng Vũng Tàu (Vung Tau)"},{"en_name":"Woori BANK HCMC","vn_name":"NH Woori HCM","cardLength":0,"shortName":"WHHCM","bankCode":"637","napasSupported":false,"status":"C","channel":"IBFT","displayName":"NH Woori HCM (WHHCM)"},{"en_name":"WOORI BANK Hanoi","vn_name":"WOORI BANK Hà Nội","bankId":"970457","atmBin":"970457","cardLength":0,"shortName":"WHHN","bankCode":"624","type":"ACC","napasSupported":true,"status":"A","channel":"IBFT","displayName":"WOORI BANK Hà Nội (WHHN)"}]';
        $arr = json_decode($string);
        foreach($arr as $item){
            DB::insert("insert nganhang(ID_NGANHANG, TENFULL, TEN) into values(?,?,?)", [$item->bankId, $item->vn_name, $item->shortName]);
        }
        return "xong";
        
    }
    

    /**
     * Hace login en la web enviando un POST con el usuario y contraseña.
     */
    private function login() {

        $URL = 'https://ebank.tpb.vn/gateway/api/auth/login';

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
