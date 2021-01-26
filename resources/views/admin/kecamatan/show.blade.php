@extends('layouts.master')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              Show Data Kecamatan
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="">Kode Kecamatan</label>
                        <input type="text" class="form-control" name="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" class="form-control" readonly >
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kecamatan</label>
                        <input type="text" class="form-control" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" readonly>
</div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection