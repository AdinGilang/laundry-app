<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" 
   href="{{ Auth::check() 
            ? (Auth::user()->role=='admin' ? route('karyawan.index') : route('pesanan.index')) 
            : url('/') }}">
   Laundry System
</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        @auth
          @if(Auth::user()->role=='admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('layanan.index') }}">Layanan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan</a></li>
          @else
            <li class="nav-item"><a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan</a></li>
          @endif
        @endauth
      </ul>
      <ul class="navbar-nav">
        @auth
          <li class="nav-item"><span class="nav-link">{{ Auth::user()->name }} ({{ Auth::user()->role }})</span></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-outline-light btn-sm">Logout</button>
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
