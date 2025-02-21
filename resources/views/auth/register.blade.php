<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/style/style.css">
    <link rel="stylesheet" href="/assets/style/bootstrap-icons/font/bootstrap-icons.css">
    <script src="/assets/style/bootstrap/js/bootstrap.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="border p-4 shadow-lg" style="width: 30rem;">
            <h2 class="py-3 text-center fw-bold">Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('register')}}" method="post" class="form-group">
                @csrf
                <label for="nis">NIS</label>
                <input type="text" name="nis" class="form-control mb-2">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control mb-2">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>