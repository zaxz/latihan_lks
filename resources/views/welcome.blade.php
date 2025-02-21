@extends('layout.app')
@section('title', 'Welcome')
@section('content')
<div class="">
    <div class="my-3">
        <h1 class="fw-bold">Pemilihan Ketua Osis</h1>
        @auth
            @if (auth()->user()->role=='admin')
            <h4>Hi {{auth()->user()->nama}}, Selamat datang</h4>
            @else
                <h4>Hi {{auth()->user()->nama}}, Vote Ketua Osis Sekarang!</h4>
                
                <a href="/voting" class="btn btn-primary mb-3">Vote!</a>
            @endif
        @else
        <div class="pb-3">
            <button type="submit" class="btn btn-primary" disabled>Vote!</button>
            <br>
            <a href="/login" class="">Silahkan Login untuk melakukan voting</a>
        </div>
        @endauth
        @if (session('errors'))
            <div class="alert alert-danger">
                {{session('errors')}}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>
    {{-- <div class="pb-4">
    @auth
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    @else
        <a href="/register" class="btn btn-primary">Register</a>
        <a href="/login" class="btn btn-primary">Login</a>
        @endauth
    </div> --}}


    <div class="row ">
        <div class="col-12 col-md-3 mb-2">
            <div class="p-4 border rounded-3">
                <button class="btn btn-primary "><i class="bi-person-fill fs-3 "></i></button>
                <div>Total Kandidat</div>
                <div class="fw-bold">{{$kandidats->count()}}</div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-2">
            <div class="p-4 border rounded-3">
                <button class="btn btn-info "><i class="bi-person-fill fs-3 text-white"></i></button>
                <div>Total Pemilih</div>
                <div class="fw-bold">{{$siswas->count()}}</div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-2">
            <div class="p-4 border rounded-3">
                <button class="btn btn-success "><i class="bi-shield-fill-check fs-3 "></i></button>
                <div>Sudah Memilih</div>
                <div class="fw-bold">{{$udh_vote->count()}}</div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-2">
            <div class="p-4 border rounded-3">
                <button class="btn btn-danger "><i class="bi-exclamation-triangle-fill fs-3 "></i></button>
                <div>Belum Memilih</div>
                <div class="fw-bold">{{$blm_vote->count()}}</div>
            </div>
        </div>
        
    </div>
    <div class="row my-5" >
        <div class="col-md-6  pb-4">
            <canvas id="barChart" class=""></canvas>
        </div>
        <div class="col-md-6">
            <div class="">
                <canvas id="barDonat" class="mx-auto"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    let ctxBar = document.getElementById('barChart').getContext('2d');
    let ctxDonat = document.getElementById('barDonat').getContext('2d');
    let barChart = new Chart(ctxBar, {
        type: "bar",
        data: {
            labels: [
                @foreach ($kandidats as $kandidat)
                "{!! $kandidat->nama !!} ({{$kandidat->persentase}}%)",
                @endforeach
            ],
            datasets: [
                {
                    label: "Suara",
                    data: [
                        @foreach ($kandidats as $kandidat)
                        {{$kandidat->vote_count}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                    ],
                },
            ],
        },
    });
    let barDonat = new Chart(ctxDonat, {
        type: "pie",
        data: {
            labels: [
                "Sudah Memilih ({{$persentaseUdh}}%)","Belum Memilih ({{$persentaseBlm}}%)",
            ],
            datasets: [
                {
                    label: "Suara",
                    data: [
                        {{$udh_vote->count()}},{{$blm_vote->count()}}
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 159, 64)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                    ]
                },
            ],
        },
        options :{
            responsive:false,
        }
    });
</script>
@endsection