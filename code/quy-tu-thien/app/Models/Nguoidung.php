<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    public $timestamps = false;
    
    
    public static function checkmany($sdt, $email) {
        $check = Nguoidung::where('xacthuc', true)
            ->whereNull('ngu_id_nguoidung')
            ->where(function($sql) use ($sdt, $email){
                if (isset($sdt)){
                    $sql->orWhere('sdt', DB::raw('MY_ENCR(\''.$sdt.'\')'));
                }
                if (isset($email)){
                    $sql->orWhere('email', DB::raw('MY_ENCR(\''.$email.'\')'));
                }
            })->first();
        return isset($check) ? $check->ID_NGUOIDUNG : null;
    }
    
    public static function getlist(){
        return Nguoidung::select("ID_NGUOIDUNG", DB::raw("MY_DECR(HOTEN) as HOTEN"))
                ->where("xacthuc",true)->get();
    }
    
}
