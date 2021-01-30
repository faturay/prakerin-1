@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><br>
                    Data Kasus
                <a href="{{route('kasus.create')}}" class="btn btn-primary float-right">
                Tambah Data</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                        <thead>
                                            <th>No</th>
                                            <th >Lokasi</th>
                                            <th>RW</th>
                                            <th>Jumlah Positif</th>
                                            <th>Jumlah Sembuh</th>
                                            <th>Jumlah Meninggal</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no=1;
                                    @endphp
                                    @foreach($kasus as $data)

                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>Provinsi : {{$data->rw->desa->kecamatan->kota->provinsi->nama_provinsi}}<br>
                                            Kota : {{$data->rw->desa->kecamatan->kota->nama_kota}}<br>
                                            Kecamatan : {{$data->rw->desa->kecamatan->nama_kecamatan}}<br>
                                            Desa : {{$data->rw->desa->nama_desa}}</td>
                                            <td>{{$data->rw->no_rw}}</td>
                                            <td>{{$data->positif}}</td>
                                            <td>{{$data->sembuh}}</td>
                                            <td>{{$data->meninggal}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>
                                            <form action="{{route('kasus.destroy',$data->id)}}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info" href=" {{ route('kasus.show', $data->id) }} ">Show</a>
                                            <a class="btn btn-warning" href=" {{ route('kasus.edit', $data->id) }} ">Edit</a>
                                            <button type="submit" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection