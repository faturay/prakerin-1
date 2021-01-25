<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function Desa(){
        return $this->hasMany('App\Models\desa','id_desa');
    }
    public function Kota(){
        return $this->belongsTo('App\Models\kota','id_kota');
    }
}
