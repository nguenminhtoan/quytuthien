<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Taikhoan;

class Tuthien extends Model
{
    use HasFactory;
    protected $table = "tuthien";
    public $timestamps = false; 

    public static function getlist($id = null, $xacthuc = true, $offset = 10)
    {
        $list = Tuthien::select("tuthien.*", "SONGUOI", 'SOTIEN', DB::raw('nguoidung.HINHANH as PATH'))
                    ->join("nguoidung", function($sql){
                        $sql->on("nguoidung.ID_NGUOIDUNG", "tuthien.ID_NGUOIDUNG")
                            ->where("nguoidung.xacthuc", true);
                    })
                    ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS SOTIEN,
                            COUNT(ID_QUYENGOP) AS SONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->where(function($sql) use ($xacthuc) {
                    if($xacthuc) {
                        $sql->where('tuthien.xacthuc', $xacthuc);
                    }
                })
                ->where(function($sql) use ($id) {
                    if($id) {
                        $sql->where("nguoidung.ID_NGUOIDUNG", $id);
                    }
                })
                ->paginate($offset);
        return $list;
    }
    
    public static function getdetail($id_tuthien) {
        $detail = Tuthien::select(
                    "tuthien.*",
                    "SONGUOI",
                    "SOTIEN", 
                    DB::raw("MY_DECR(tuthien.SDT) as DT"),
                    "TONGCHI",
                    "TONGHTRO",
                    "BATDAUHD",
                    "KETTHUCHD",
                    "nguoidung.HINHANH as PATH",
                    DB::raw("MY_DECR(nguoidung.HOTEN) as HOTEN")
                )
                ->join("nguoidung", function($sql){
                    $sql->on("nguoidung.ID_NGUOIDUNG", "tuthien.ID_NGUOIDUNG")
                        ->where("nguoidung.xacthuc", true);
                })
                ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS SOTIEN,
                            COUNT(ID_QUYENGOP) AS SONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->leftJoin(DB::raw("(SELECT 
                            ID_TUTHIEN,
                            SUM(SOTIEN) as TONGCHI,
                            COUNT(hoatdong.ID_HOATDONG) as TONGHTRO,
                            MIN(BATDAU) as BATDAUHD,
                            MAX(KETTHUC) as KETTHUCHD
                        FROM
                            hoatdong
                                JOIN
                            chitiet ON chitiet.ID_HOATDONG = hoatdong.ID_HOATDONG
                        GROUP BY ID_TUTHIEN) AS B"), 
                        "B.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->where('tuthien.xacthuc', true)
                ->where('tuthien.ID_TUTHIEN',$id_tuthien)
                ->first();
            $detail->TAIKHOAN = Taikhoan::getlist($detail->ID_TUTHIEN);
        return $detail;
    }

    public static function getlisthot()
    {
        $list = Tuthien::select("tuthien.*", "SONGUOI", 'SOTIEN', DB::raw('nguoidung.HINHANH as PATH'))
                    ->join("nguoidung", function($sql){
                        $sql->on("nguoidung.ID_NGUOIDUNG", "tuthien.ID_NGUOIDUNG")
                            ->where("nguoidung.xacthuc", true);
                    })
                    ->leftJoin(DB::raw("(SELECT 
                        SUM(SOTIEN) AS SOTIEN,
                            COUNT(ID_QUYENGOP) AS SONGUOI,
                            ID_TUTHIEN
                        FROM quyengop where xacthuc = 1 GROUP BY ID_TUTHIEN) AS A"), 
                        "A.ID_TUTHIEN", "tuthien.ID_TUTHIEN")
                ->where('tuthien.xacthuc', true)
                ->orderBy("LUOCXEM", "desc")
                ->limit(2)
                ->get();
        return $list;
    }
    
}
