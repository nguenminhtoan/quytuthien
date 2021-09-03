<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GayquyForm;
use App\Models\Tuthien;
use App\Models\Nguoidung;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TuthienController extends Controller
{
    
    public function index(){
        $list = Tuthien::getlist();
        return view('tuthien.index', ['list' => $list]);
    }
    
    public function show($id){
        $array = Tuthien::getdetail($id);
        return view('tuthien.show',['array' => $array]);
    }

    public function create() {
        return view('tuthien.create');
    }
    
    public function save(GayquyForm $request) {
        DB::beginTransaction();
        try {
            $file = $request->file('image');
            
            $check = Nguoidung::checkmany($request->sdt, $request->email);
            
            $new = new Tuthien();
            $new->tenquy = $request->tenquy;
            $new->batdau = $request->batdau;
            $new->ketthuc = $request->ketthuc;
            $new->phutrach = $request->phutrach;
            $new->diachi = $request->diachi;
            if ($request->sdt) {
                $new->sdt = DB::raw("MY_ENCR('".$request->sdt."')");
            }
            $new->ghichu = $request->ghichu;
            $new->mota = $request->mota;
            $new->xacthuc = false;
            $new->ngaytao = date("Y-m-d H:i:s");
            if($check) {
                $new->id_nguoidung = $check;
            }
            $new->save();
            $id_tuthien = $new->id;

            if (isset($id_tuthien)){
                if (is_null($check)) {
                    $user = new Nguoidung();
                    $user->hoten = $request->hoten;
                    $user->hinhanh = '/image/user/user.jpg';
                    if ($request->email) {
                        $user->email = DB::raw("MY_ENCR('".$request->email."')");
                    }
                    if ($request->sdt) {
                        $user->sdt = DB::raw("MY_ENCR('".$request->sdt."')");
                    }
                    $user->diachi = $request->diachi;
                    $user->quyen = false;
                    $user->xacthuc = false;
                    $user->matkhau = Hash::make('12345');
                    $user->save();
                    $check = $user->id;
                }
                $id_nguoidung = $check;
                if ($request->email) {
                    $data = [
                        "to" => $request->email,
                        "subject" => "[Quỹ từ thiện] Thông tin tài khoản ". $user->hoten,
                        "template" => "taikhoan",
                        "data" => [
                            "id_nguoidung" => $id_nguoidung,
                            "matkhau" => '12345'
                        ]
                    ];
                    $email = new SendEmail($data);
                    Mail::to($data["to"])->send($request->email);
                }

                if ($file) {
                    $fileName = date('ymdHis').'.'.$file->extension();
                    Storage::disk('public')->putFileAs('tuthien/'.$id_tuthien, $file, $fileName);
                    Tuthien::where('ID_TUTHIEN', $id_tuthien)
                        ->update([
                            'hinhanh' => '/tuthien/'.$id_tuthien.'/'.$fileName, 
                            'id_nguoidung' => $id_nguoidung
                        ]);
                }

                foreach($request->taikhoan as $item) {
                    $new = new Taikhoan();
                    $new->id_tuthien = $id_tuthien;
                    $new->ma_taikhoan = DB::raw("MY_ENCR('".$item['ma_taikhoan']."')");
                    $new->hoten = DB::raw("MY_ENCR('".$item['hoten']."')");
                    $new->nganhang = DB::raw("MY_ENCR('".$item['nganhang']."')");
                    $new->save();
                }
            }
            DB::commit();
            return redirect("/tu-thien/".$id_tuthien);
        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
