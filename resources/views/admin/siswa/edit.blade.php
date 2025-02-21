@extends('layout.app')
@section('title', 'Edit Siswa')
@section('content')
<div class="d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="fs-2 fw-bold text-white">Edit Siswa</div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                        @endforeach
                </div>
                @endif
                <form action="{{route('siswa.update', $siswa->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="nis">Nis</label>
                    <input type="text" name="nis" value="{{$siswa->nis}}" class="form-control mb-1">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="{{$siswa->nama}}" class="form-control mb-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control mb-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection