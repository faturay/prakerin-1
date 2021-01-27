@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Data Kasus</b> 
                    <a href="{{route('kasus.create')}}" class="btn btn-primary float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>rw</th>
                                <th>jumlah positif</th>
                                <th>jumlah sembuh</th>
                                <th>jumlah meninggal</th>
                                <th>tanggal</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kasus as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->rw->rw}}</td>
                                <td>{{$data->jumlah_positif}}</td>
                                <td>{{$data->jumlah_sembuh}}</td>
                                <td>{{$data->jumlah_meninggal}}</td>
                                <td>{{$data->jumlah_tanggal}}</td>

                                <td>
                                    <form action="{{route('kasus.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{ route('kasus.show', $data->id) }} ">Show</a>
                                        <a class="btn btn-warning" href=" {{ route('kasus.edit', $data->id) }} ">Edit</a>
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection