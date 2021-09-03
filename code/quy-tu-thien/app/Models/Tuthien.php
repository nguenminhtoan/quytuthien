<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tuthien extends Model
{
    use HasFactory;
    protected $table = "tuthien";

    public static function getlist()
    {
        $list = Tuthien::select("*")
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
    
    public static function getlisthot()
    {
        $list = Tuthien::select("*")
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
