@extends('layout.app')
@section('title', 'Kelola Siswa')
@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <div class="fs-2 fw-bold">Kelola Kandidat Osis</div>
        <a href="/admin/kandidat/create" class="btn btn-primary">+ Kandidat</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if (isset($kandidats))
    
    <form action="{{route('kandidat.index')}}" method="get" class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari Kandidat">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $kandidat)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kandidat->nama}}</td>
                    <td>{{$kandidat->visi}}</td>
                    <td>{{$kandidat->misi}}</td>
                    <td><img src="{{asset('storage/'. $kandidat->foto)}}" alt="{{$kandidat->nama}}" style="width: 100px"></td>
                    <td>
                        <a href="{{route('kandidat.edit', $kandidat->id)}}" class="btn btn-primary mb-2"><i class="bi-pencil"></i></a>
                        <form action="{{route('kandidat.destroy', $kandidat->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    @else
    <p>Belum ada kandidat</p>
    @endif
@endsection