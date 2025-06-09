<!DOCTYPE html>
<html lang="id">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<!-- AOS Animation (opsional, bisa dihapus jika tidak butuh) -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<style>
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #fff;
    color: #333;
  }

  h1, h2, h3, .navbar-brand {
    font-weight: 600;
  }

  .hero {
    padding: 60px 20px;
  }

  .hero img {
    transition: transform 0.3s ease;
  }

  .hero img:hover {
    transform: scale(1.05);
  }
</style>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ASRI - Aplikasi Asisten SR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('images/SR_Logo_Clear.png') }}">
  <style>
    .text-justify {
      text-align: justify;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
    <img src="{{ asset('images/SR_Logo_Clear.png') }}" alt="Logo ASRI" width="30" height="30" class="me-2">
    <span>ASRI</span>
      </a>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menu Kiri -->
        <ul class="navbar-nav me-auto">
          @auth
          <!-- Pelanggaran Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarPelanggaran" role="button" data-bs-toggle="dropdown">
              Pelanggaran
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('terlambat.index') }}">Terlambat</a></li>
              <li><a class="dropdown-item" href="{{ route('pelanggaran.melanggar') }}">Melanggar Aturan</a></li>
            </ul>
          </li>

          <!-- Profil Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarProfil" role="button" data-bs-toggle="dropdown">
              Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('profil.putra') }}">Gedung Asrama Putra</a></li>
              <li><a class="dropdown-item" href="{{ route('profil.putri') }}">Gedung Asrama Putri</a></li>
            </ul>
          </li>

          <!-- Keaktifan Dorm -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarProfil" role="button" data-bs-toggle="dropdown">
              Keaktifan Dorm
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('acara.index') }}">Kelola Acara</a></li>
              <li><a class="dropdown-item" href="{{ route('acara.index') }}">Kehadiran</a></li>
            </ul>
          </li>
          @endauth
        </ul>

        <!-- Login/Register or User Menu -->
        <ul class="navbar-nav">
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarUser" role="button" data-bs-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-danger text-white py-4 text-center mt-4">
    <p class="mb-1">&copy; 2025 ASRI - Aplikasi Asisten Senior Residence</p>
    <p class="mb-2">Direktorat Kemahasiswaan Karier dan Alumni, Telkom University</p>
    <div>
      <a href="#" class="text-white text-decoration-none mx-2">Kontak</a>
      <a href="#" class="text-white text-decoration-none mx-2">Tentang</a>
      <a href="#" class="text-white text-decoration-none mx-2">FAQ</a>
    </div>
  </footer>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
