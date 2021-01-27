@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Kasus
                    </div>
                    <div class="card-body">
                        <form action="{{route('kasus.update')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Rw</label>
                                <select name="id_rw" class="form-control">
                                    @foreach($rw as $data)
                                    <option value="{{$data->id}}">{{$data->rw}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">jumlah positif</label>
                                <input type="integer" name="positif" value="{{$kasus->jumlah_positif}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">jumlah sembuh</label>
                                <input type="integer" name="sembuh" value="{{$kasus->jumlah_sembuh}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">jumlah meninggal</label>
                                <input type="integer" name="meninggal" value="{{$kasus->jumlah_meninggal}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">tanggal</label>
                                <input type="date" name="tgl" value="{{$kasus->tanggal}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn block">Simpan</button>
                                <a href=" {{ route('rw.index') }} " class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection