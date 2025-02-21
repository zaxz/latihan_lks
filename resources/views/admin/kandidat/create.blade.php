@extends('layout.app')
@section('title', 'Tambah Kandidat')
@section('content')
<div class="mt-4 d-flex justify-content-center ">
    <div class="col-md-6">
        <div class="card w-100">
            <div class="card-header bg-primary text-white">
                <h4 class="my-3 fw-bold">Tambah Kandidat</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                </div>
                @endif
                <form action="{{route('kandidat.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="nama">Nama Kandidat</label>
                    <input type="text" name="nama" class="form-control">
                    <label for="visi">Visi</label>
                    <textarea name="visi" class="form-control"></textarea>
                    <label for="misi">Misi</label>
                    <textarea name="misi" class="form-control"></textarea>
                    <label for="foto">Unggah Foto</label>
                    <input type="file" name="foto" class="form-control">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection