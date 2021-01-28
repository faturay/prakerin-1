@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Rw
                    </div>
                    <div class="card-body">
                        <form action="{{route('rw.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih desa</label>
                                <select name="id_desa" class="form-control">
                                    @foreach($rw as $data)
                                    <option value="{{$data->id}}">{{$data->nama_desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">No Rw</label>
                                <input type="integer" name="no_rw" class="form-control" required>
                                @if ($errors->has('no_rw'))
                    <span class="text-danger">{{$errors->first('no_rw')}}</span>
                    @endif
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