<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/style/style.css">
    <link rel="stylesheet" href="/assets/style/bootstrap-icons/font/bootstrap-icons.css">
    <script src="/assets/style/chart.js"></script>
    <script src="/assets/style/bootstrap/js/bootstrap.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="/">Navbar</a>
          <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNavDropdown" 
            aria-controls="navbarNavDropdown" 
            aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              @auth
              @if (auth()->user()->role=='admin')
              @else
              <li class="nav-item">
                <a class="nav-link" href="/voting">Voting</a>
              </li>
              @endif
              @endauth
              @auth
              @if (auth()->user()->role == 'admin')    
              <li class="nav-item">
                <a class="nav-link" href="/admin/siswa">Kelola Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/kandidat">Kelola Kandidat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/laporan">Laporan</a>
              </li>
              @endif
              @endauth
              @auth
              <div class="d-flex justify-content-end d-block d-lg-none">
                  <form action="{{route('logout')}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger">Logout</button>
                  </form>
              </div>
              @endauth
            </ul>
          </div>
          @auth
          <div class="d-flex justify-content-end d-none d-lg-block">
              <form action="{{route('logout')}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
              </form>
          </div>
          @endauth
        </div>
    </nav>
      <div class="container ">
          @yield('content')
      </div>
</body>
</html>