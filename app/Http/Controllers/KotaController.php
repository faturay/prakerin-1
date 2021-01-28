<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\Models\Provinsi;


class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $kota = Kota::with('provinsi')->get();
            return view('admin.kota.index',compact('kota'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|max:4|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ],
        [
            'kode_kota.required' => "kode harus di isi",
            'kode_kota.max' => "kode maksimal 4 nomer",
            'kode_kota.unique' => "kode sudah di pakai",
            'nama_kota.required' => "nama kota harus di isi",
            'nama_kota.unique' => "nama sudah di pakai",
        ]);

        $kota = new Kota();
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index') ->with(['success'=>'data berhasil di simpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('admin.kota.show',compact('kota'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::findOrFail($id);
        return view('admin.kota.edit',compact('kota','provinsi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index') ->with(['success'=>'Data <b>',$kota->nama_kota,'</b> berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')->with(['success'=>'Data <b>',$kota->nama_kota, '</b> berhasil di hapus']);

    }
}
