<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    
    public function Kecamatan(){
        return $this->hasMany('App\Models\kecamatan','id_kecamatan');
    }
    public function Provinsi(){
        return $this->belongsTo('App\Models\provinsi','id_provinsi');
    }
}
