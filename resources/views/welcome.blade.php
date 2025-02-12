@extends('layout.app')
@section('title', 'Welcome')
@section('content')
<div class="container">
    <h1>Welcome to Laravel</h1>
    <p>This is the content of the welcome page.</p>

    <div class="row ">
        <div class="col-12 col-md-3">
            <div class="p-4 border rounded-3">
                <button class="btn btn-primary "><i class="bi-person-fill fs-3 "></i></button>
                <div>Total Kandidat</div>
                <div class="fw-bold">3</div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="p-4 border rounded-3">
                <button class="btn btn-info "><i class="bi-person-fill fs-3 text-white"></i></button>
                <div>Total Pemilih</div>
                <div class="fw-bold">3</div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="p-4 border rounded-3">
                <button class="btn btn-success "><i class="bi-shield-fill-check fs-3 "></i></button>
                <div>Sudah Memilih</div>
                <div class="fw-bold">3</div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="p-4 border rounded-3">
                <button class="btn btn-danger "><i class="bi-exclamation-triangle-fill fs-3 "></i></button>
                <div>Belum Memilih</div>
                <div class="fw-bold">3</div>
            </div>
        </div>
        
    </div>
    <canvas id="barChart"></canvas>
</div>

<script>
    let ctxBar = document.getElementById('barChart').getContext('2d');
    let barChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
            ],
            datasets: [
                {
                    label: "work load",
                    data: [2, 9, 3, 17, 6, 3, 7],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
            ],
        },
    });
</script>
@endsection