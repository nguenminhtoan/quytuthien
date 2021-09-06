<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Nguoidung extends Authenticatable
{
    use Notifiable;
    protected $table = 'nguoidung';
    public $timestamps = false;
    public $primaryKey = 'ID_NGUOIDUNG';
    
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
    
    public static function authcheck($taikhoan){
        $check = Nguoidung::where(function($sql) use ($taikhoan){
            if($taikhoan){
                $sql->where("id_nguoidung",$taikhoan)
                    ->whereOr("email",$taikhoan);
            }
        })->first();
        return $check;
    }
    
}
