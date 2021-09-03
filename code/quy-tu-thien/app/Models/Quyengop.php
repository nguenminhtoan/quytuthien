<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Quyengop extends Model
{
    use HasFactory;
    protected $table = 'quyengop';
    public $timestamps  = false;
    
    
    public static function checkmany($den, $hoten, $sotien, $ngay, $magiaodich){
        $check = Quyengop::where("taikhoan", DB::raw('MY_ENCR(\''.$den.'\')'))
                ->where("ten", DB::raw('MY_ENCR(\''.$hoten.'\')'))
                ->where("sotien", $sotien)
                ->where("thoigian", $ngay)
                ->where(function($sql) use ($magiaodich){
                    $sql->whereNull('magiaodich')
                        ->orWhere('magiaodich', $magiaodich);
                })
                ->first();
        return is_null($check);
    }
}
