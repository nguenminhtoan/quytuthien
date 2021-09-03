<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyengop extends Model
{
    use HasFactory;
    protected $table = 'quyengop';
    public $timestamps  = false;
    
    
    public static function checkmany($den, $hoten, $sotien, $ngay){
        $check = Quyengop::where("taikhoan", $den)
                ->where("ten", $hoten)
                ->where("sotien", $sotien)
                ->where("thoigian", $ngay)
                ->first();
        return is_null($check);
    }
}
