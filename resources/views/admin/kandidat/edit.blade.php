@extends('layout.app')
@section('title', 'Tambah Kandidat')
@section('content')
<div class="d-flex mt-5 justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="fs-2 fw-bold text-white">Edit Kandidat</div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                <form action="{{route('kandidat.update', $kandidats->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    @method('PUT')
                    <label for="nama">Nama Kandidat</label>
                    <input type="text" name="nama" class="form-control" value="{{$kandidats->nama}}">
                    <label for="visi">Visi</label>
                    <textarea name="visi" class="form-control">{{$kandidats->visi}}</textarea>
                    <label for="misi">Misi</label>
                    <textarea name="misi" class="form-control">{{$kandidats->misi}}</textarea>
                    <label for="foto">Unggah Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection