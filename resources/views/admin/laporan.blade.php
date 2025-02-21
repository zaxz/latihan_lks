@extends('layout.app')
@section('title','Laporan')
@section('content')
<div class="my-4" id="laporan">
    <h2 class="fw-bold">Laporan Kandidat Osis</h2>
    <button class="btn btn-primary" onclick="print()">Print</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Perolehan Suara</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $kandidat) 
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{url('storage', $kandidat->foto)}}" alt="" style="width: 100px"></td>
                    <td>{{$kandidat->nama}}</td>
                    <td>{{$kandidat->vote_count}}</td>
                    <td>{{$kandidat->persentase}}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #laporan, #laporan * {
            visibility: visible;
        }
        #laporan {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .btn {
            display: none;
        }
    }
</style>
@endsection