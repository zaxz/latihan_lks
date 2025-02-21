@extends('layout.app')
@section('title', 'Tambah Siswa')
@section('content')
<div class="mt-4 d-flex justify-content-center ">
    <div class="col-md-6">
        <div class="card w-100">
            <div class="card-header bg-primary text-white">
                <h4 class="my-3 fw-bold">Tambah Siswa</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
                @endif
                <form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control">
                    <label for="nis">NIS</label>
                    <input type="text" name="nis" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection