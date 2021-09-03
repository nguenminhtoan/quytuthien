<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tuthien extends Model
{
    use HasFactory;
    protected $table = "tuthien";

    public static function getlist()
    {
        $list = Tuthien::select("tuthien.*", "SONGUOI", 'SOTIEN')
                    ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS SOTIEN,
                            COUNT(ID_QUYENGOP) AS SONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->where('xacthuc', true)
                ->get();
        return $list;
    }
    
    public static function getdetail($id_tuthien) {
        $array = Tuthien::select("tuthien.*","nguoidung.HOTEN", "A.TSOTIEN", "A.TSONGUOI", "hoatdong.TEN", "hoatdong.BATDAU as BD", "hoatdong.KETTHUC as KT", "chitiet.SOTIEN", "tuthien.MOTA")
                ->leftJoin("hoatdong","tuthien.ID_TUTHIEN", "hoatdong.ID_TUTHIEN")
                ->leftJoin("chitiet","chitiet.ID_HOATDONG", "hoatdong.ID_HOATDONG")
                ->leftJoin("nguoidung","hoatdong.ID_NGUOIDUNG", "nguoidung.ID_NGUOIDUNG")
                ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS TSOTIEN,
                            COUNT(ID_QUYENGOP) AS TSONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->leftJoin("taikhoan","taikhoan.ID_TUTHIEN","tuthien.ID_TUTHIEN") 
                ->where('tuthien.ID_TUTHIEN',$id_tuthien)
                ->get();
        return $array;
    }

        
    public static function getlisthot()
    {
        $list = Tuthien::select("tuthien.*", "SONGUOI", 'SOTIEN')
                    ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS SOTIEN,
                            COUNT(ID_QUYENGOP) AS SONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->where('xacthuc', true)
                ->where('batdau' , '>', date('Y-m-d'))
                ->get();
        return $list;
    }
    
}
