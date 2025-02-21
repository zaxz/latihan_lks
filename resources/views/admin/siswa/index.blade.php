@extends('layout.app')
@section('title', 'Kelola Siswa')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <div class="fs-2 fw-bold">Kelola Siswa</div>
        <a href="/admin/siswa/create" class="btn btn-primary">+ Siswa</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('siswa.index')}}" method="get" class="input-group">
        <input type="text" name="search" placeholder="Cari Kandidat" class="form-control">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>*******</td>
                    <td class="d-flex justify-content-end">
                        <div class="d-flex ">
                            <form action="{{route('siswa.edit', $siswa->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary me-2"><i class="bi-pencil"></i></button>
                            </form>
                            <form action="{{route('siswa.destroy', $siswa->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection