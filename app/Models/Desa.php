<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    public function Rw(){
        return $this->hasMany('App\Models\rw','id_rw');
    }
    public function Kecamatan(){
        return $this->belongsTo('App\Models\kecamatan','id_kecamatan');
    }
}
