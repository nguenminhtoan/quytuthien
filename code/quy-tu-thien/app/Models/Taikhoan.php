<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    use HasFactory;
    protected $table = "taikhoan";
    
    public static function getlist($tuthien) {
        $list = Taikhoan::where('id_tuthien', $tuthien)
                ->get()
                ->toArray();
        return $list;
    } 
}
