<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    public function Kasus(){
        return $this->hasMany('App\Models\kasus','id_kasus');
    }
    public function Desa(){
        return $this->belongsTo('App\Models\desa','id_desa');
    }
}
