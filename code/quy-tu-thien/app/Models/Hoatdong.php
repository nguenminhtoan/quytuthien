<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Hinhanh;
use App\Models\Chitiet;

class Hoatdong extends Model
{
    use HasFactory;
    protected $table = "hoatdong";
    
    public static function getlist($id){
        $list = Hoatdong::select(
                    "hoatdong.*", 
                    "SOTIEN",
                    "ha.PATH",
                    DB::raw("MY_DECR(nguoidung.HOTEN) as HOTEN")
                )
                ->join("nguoidung", "nguoidung.id_nguoidung", "hoatdong.id_nguoidung")
                ->join(DB::raw("(SELECT 
                            SUM(SOTIEN) as SOTIEN, ID_HOATDONG
                        FROM
                            chitiet
                        GROUP BY ID_HOATDONG) as ct"), 
                        'ct.ID_HOATDONG', 'hoatdong.id_hoatdong')
                ->leftJoin(DB::raw("(SELECT 
                            MAX(PATH) as PATH, ID_HOATDONG
                        FROM
                            hinhanh
                        GROUP BY ID_HOATDONG) as ha"), 
                        'ha.ID_HOATDONG', 'hoatdong.id_hoatdong')
                ->where("id_tuthien", $id)
                ->paginate(10);
        return $list;
                
    }
    
    public static function getdetail($id){
        $detail = Hoatdong::where('id_hoatdong', $id)->first();
        $detail->HINHANH = Hinhanh::where('id_hoatdong', $id)->get();
        $detail->CHITIET = Chitiet::where('id_hoatdong', $id)->get();
        return $detail;
    }
}
