<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'ASRI')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
    }
    .auth-box {
      max-width: 500px;
      margin: auto;
      margin-top: 60px;
    }
  </style>
</head>
@yield('scripts') 
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">ASRI</a>
      <div class="ms-auto">
        @if(Route::is('login'))
          <a class="nav-link text-white d-inline" href="{{ route('register') }}">Register</a>
        @else
          <a class="nav-link text-white d-inline" href="{{ route('login') }}">Login</a>
        @endif
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container">
    <div class="auth-box">
      @yield('content')
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-danger text-white py-4 text-center mt-5">
    <p class="mb-1">&copy; 2025 ASRI - Aplikasi Asisten Senior Residence</p>
    <p class="mb-2">Direktorat Kemahasiswaan Karier dan Alumni, Telkom University</p>
    <div>
      <a href="#" class="text-white text-decoration-none mx-2">Kontak</a>
      <a href="#" class="text-white text-decoration-none mx-2">Tentang</a>
      <a href="#" class="text-white text-decoration-none mx-2">FAQ</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
