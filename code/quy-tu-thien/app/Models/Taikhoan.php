<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Taikhoan extends Model
{
    use HasFactory;
    protected $table = "taikhoan";
    
    public static function getlist($tuthien) {
        $list = Taikhoan::select(DB::raw("MY_DECR(MA_TAIKHOAN) as MA_TAIKHOAN"))->where('id_tuthien', $tuthien)
                ->get()
                ->toArray();
        return $list;
    } 
}
