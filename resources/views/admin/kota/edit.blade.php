@extends('layouts.master')
@section('content')
                   <div class="container">
                      <div class="col-md-12">
                      <div class="card">
                       <div class="card-header">
                        Edit Data Kota
                   </div>
                <div class="card-body">
                <form action="{{route('kota.update',$kota->id)}}" method="post">
                  @method('put')
                  @csrf
                                
                  <div class="form-group">
                  <label for="">Pilih Provinsi</label>
                  <select name="id_provinsi" class="form-control" require>
                  @foreach($provinsi as $data)
                  <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                  @endforeach
                  </select>
                  </div>
                 <div class="form-group">
                    <label for="">Kode Kota</label>
                    <input type="text" name="kode_kota" value="{{$kota->kode_kota}}" required>
                 <div class="form-group">
                    <label for="">Nama Kota</label>
                    <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" required>
                    </div>
                 <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-block">Simpan</button>
             </div>
          </form>
        </div>
      </div>
    </div>
   </div>
 </div>
 @endsection