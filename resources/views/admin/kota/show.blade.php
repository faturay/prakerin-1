@extends('layouts.master')
@section('content')
                   <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="card">
                       <div class="card-header">
                        Edit Data Kota
                   </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="">Provinsi</label>
                    <input type="text" class="form-control" name="id_provinsi" value="{{$kota->provinsi->nama_provinsi}}">
                    </div>
                 <div class="form-group">
                    <label for="">Kode Kota</label>
                    <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" readonly>
                    </div>
                 <div class="form-group">
                    <label for="">Nama Kota</label>
                    <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" readonly>
                    </div>
                 <div class="form-group">
                 <a href="{{route('kota.index')}}" class="btn btn primary btn-block">Kembali</a>
             </div>
          </div>
       </div>
     </div>
   </div>
 </div>
 @endsection