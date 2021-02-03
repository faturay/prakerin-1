<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kasus;

class ApiController extends Controller
{
    public function index()
    {
        $positif = DB::table('rws')
                   ->select('kasuses.positif',
                            'kasuses.sembuh',
                            'kasuses.meninggal')
                   ->join('kasuses','rws.id', '=' ,'kasuses.id_rw')
                   ->sum('kasuses.positif');
        $sembuh = DB::table('rws')
                   ->select('kasuses.positif',
                            'kasuses.sembuh',
                            'kasuses.meninggal')
                   ->join('kasuses','rws.id', '=' ,'kasuses.id_rw')
                   ->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')
                   ->select('kasuses.positif',
                            'kasuses.sembuh',
                            'kasuses.meninggal')
                   ->join('kasuses','rws.id', '=' ,'kasuses.id_rw')
                   ->sum('kasuses.meninggal');

        $res = [
            'succes'           => true,
            'Data'             => 'Data Kasus Indonesia',
            'Jumlah Positif'   => $positif,
            'Jumlah Sembuh'    => $sembuh,
            'Jumlah Meninggal' => $meninggal,
            'message'          => 'Data Kasus Ditampilkan'
        ];

        return response()->json($res,200);
    }

    public function provinsi($id)
    {
        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('desas','desas.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_desa','=','desas.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.sembuh) as sembuh'),
        DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->groupBy('nama_provinsi')
        ->get();

        $data = [
            'success' => true,
            'Data Provinsi' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
return response()->json($data,200);


    }
    
}
