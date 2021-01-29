@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                @livewireScripts
                @livewire('livewire',['selectedRw' => $kasus->id_rw,'id' => $kasus->id])
                @livewireStyles
                <div class="form-group">
                <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection