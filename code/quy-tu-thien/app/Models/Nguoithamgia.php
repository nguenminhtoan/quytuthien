<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nguoithamgia extends Model
{
    use HasFactory;
    protected $table = 'nguoithamgia';
    public $timestamps = false;


    public static function checkmany($sdt, $email) {
        $check = Nguoithamgia::where(function($sql) use ($sdt, $email){
            if (isset($sdt)){
                $sql->orWhere('sdt', DB::raw('MY_ENCR(\''.$sdt.'\')'));
            }
            if (isset($email)){
                $sql->orWhere('email', DB::raw('MY_ENCR(\''.$email.'\')'));
            }
        })->first();
        return isset($check) ? $check->MA_THAMGIA : null;
    }
}
