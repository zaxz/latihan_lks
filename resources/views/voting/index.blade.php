@extends('layout.app')
@section('title', 'Voting')
@section('content')
    <div class="min-vh-100">
        <h2 class="text-center fw-bold my-4">Silahkan Pilih Kandidat OSIS Pilihanmu!</h2>
        <div class="row d-flex justify-content-center">
            @foreach ($kandidats as $kandidat)
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <div class="card overflow-hidden w-75">
                    <img src="{{asset('storage/'. $kandidat->foto)}}" alt="" class="w-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$kandidat->nama}}</h5>
                        <form action="{{route('visimisi', $kandidat->id)}}" method="get">
                            <button type="submit" class="btn btn-warning w-100 mb-2">Visi & misi</button>
                        </form>
                        <form action="{{route('voting')}}" method="post">
                            @csrf
                            <input type="hidden" name="kandidat_id" value="{{$kandidat->id}}">
                            <button class="btn btn-primary w-100">Pilih</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection