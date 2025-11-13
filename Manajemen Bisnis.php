<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teknik Informatika - Portofolio PBL</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2b1055, #7597de);
      color: white;
      overflow-x: hidden;
    }

    .background {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 0%, transparent 40%),
                  radial-gradient(circle at 80% 80%, rgba(255,255,255,0.05) 0%, transparent 40%);
      filter: blur(40px);
      z-index: 0;
    }

    .navbar {
      background: rgba(255, 255, 255, 0.1) !important;
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .navbar-brand, .nav-link, .dropdown-item {
      color: #fff !important;
      font-weight: 500;
    }

    .nav-link:hover, .dropdown-item:hover {
      color: #00e6ff !important;
    }

    .navbar .dropdown-menu {
      background: linear-gradient(135deg, rgba(43, 16, 85, 0.95), rgba(117, 151, 222, 0.95)) !important;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(8px);
    }

    .navbar .dropdown-menu a {
      color: #fff !important;
      font-weight: 500;
      transition: 0.3s;
      padding: 10px 20px;
      border-radius: 8px;
    }

    .navbar .dropdown-menu a:hover {
      background: rgba(0, 230, 255, 0.2);
      color: #00e6ff !important;
    }

    .hero {
      text-align: center;
      padding: 120px 20px;
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-weight: 700;
      text-shadow: 0 0 15px rgba(0, 230, 255, 0.5);
    }

    .hero p {
      max-width: 700px;
      margin: 15px auto;
      color: #dbe8ff;
    }

    .hero-divider {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      height: 3px;
      border-radius: 50px;
      background: linear-gradient(90deg, rgba(0,198,255,0) 0%, rgba(0,198,255,0.8) 50%, rgba(0,198,255,0) 100%);
      box-shadow: 0 0 15px rgba(0,198,255,0.6);
      animation: pulseGlow 3s infinite ease-in-out;
    }

    @keyframes pulseGlow {
      0%, 100% { box-shadow: 0 0 10px rgba(0,198,255,0.4); opacity: 0.8; }
      50% { box-shadow: 0 0 25px rgba(0,198,255,0.9); opacity: 1; }
    }

    .btn-upload {
      background: #00e6ff;
      color: #1a1a1a;
      border-radius: 50px;
      padding: 12px 30px;
      font-weight: 600;
      font-size: 1.1rem;
      box-shadow: 0 5px 15px rgba(0,230,255,0.4);
      transition: all 0.3s ease;
    }

    .btn-upload:hover {
      background: #00ffff;
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0,230,255,0.6);
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      transition: 0.3s;
      border-radius: 20px;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 15px rgba(0, 230, 255, 0.4);
    }

    .card a {
      color: #00e6ff;
      text-decoration: none;
    }

    .card a:hover {
      color: #fff;
      text-decoration: underline;
    }

    footer {
      background: rgba(0, 0, 0, 0.4);
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      padding: 20px 0;
      text-align: center;
      color: #dbe8ff;
      backdrop-filter: blur(15px);
    }
  </style>
</head>
<body>
  <div class="background"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="home.php">
        <img src="download-removebg-preview.png" alt="Logo" width="40" height="40">
        <span class="fw-bold">Portofolio PBL</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-3">
          <li class="nav-item"><a class="nav-link" href="home.php">Beranda</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Portofolio</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Teknik Informatika.php">Teknik Informatika</a></li>
              <li><a class="dropdown-item" href="Teknik Elektro.php">Teknik Elektro</a></li>
              <li><a class="dropdown-item" href="Teknik Mesin.php">Teknik Mesin</a></li>
              <li><a class="dropdown-item active" href="#">Manajemen Bisnis</a></li>
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>

        <form class="d-flex me-3">
          <input class="form-control rounded-pill" style="background-color:rgba(255,255,255,0.8)" type="search" placeholder="Cari proyek...">
        </form>

        <div class="dropdown">
          <button class="btn btn-outline-light rounded-circle p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="40" height="40" class="rounded-circle">
          </button>
          <ul class="dropdown-menu dropdown-menu-end text-center p-3" style="min-width: 220px;">
            <li class="mb-2">
              <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" height="60" class="rounded-circle border border-light">
            </li>
            <li><strong class="text-white">Surya Dewata</strong></li>
            <li><small class="text-light">Mahasiswa</small></li>
            <li><hr class="dropdown-divider border-light"></li>
            <li><a class="dropdown-item text-white" href="profil.php">👤 Profil Saya</a></li>
            <li><a class="dropdown-item text-white" href="hasil.php">📁 My Portofolio</a></li>
            <li><a class="dropdown-item text-white" href="login.php">🚪 Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero position-relative">
    <div class="container text-center">
      <h1>Manajemen Bisnis</h1>
      <p>Menampilkan inovasi, kreativitas, dan solusi digital mahasiswa dalam bidang teknologi informasi.</p>
      <a href="upload4.php" class="btn btn-upload mt-3">📤 Upload Portofolio</a>
    </div>
    <div class="hero-divider"></div>
  </section>

  <!-- Proyek Mahasiswa -->
  <section class="py-5">
    <div class="container">
      <h3 class="fw-bold mb-4 text-center">Proyek Mahasiswa</h3>

      <div class="row g-4">
        <!-- Aplikasi Web -->
        <div class="col-md-4">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/3209/3209071.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="aplikasi-web.html">Aplikasi Web</a></h5>
            <p class="small text-center">Proyek-proyek berbasis web yang dikembangkan oleh mahasiswa Teknik Informatika.</p>
          </div>
        </div>

        <!-- Aplikasi Mobile -->
        <div class="col-md-4">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/3534/3534033.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="aplikasi-mobile.html">Aplikasi Mobile</a></h5>
            <p class="small text-center">Inovasi aplikasi berbasis Android untuk berbagai kebutuhan pengguna.</p>
          </div>
        </div>

        <!-- Aplikasi IoT -->
        <div class="col-md-4">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1028/1028921.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="aplikasi-iot.html">Aplikasi IoT</a></h5>
            <p class="small text-center">Proyek Internet of Things untuk kehidupan yang lebih cerdas dan efisien.</p>
          </div>
        </div>

        <!-- Artificial Intelligence -->
        <div class="col-md-4">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/4712/4712100.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="artificial-intelligence.html">Artificial Intelligence</a></h5>
            <p class="small text-center">Implementasi kecerdasan buatan untuk sistem cerdas seperti chatbot, vision, dan prediksi data.</p>
          </div>
        </div>

        <!-- ERP -->
        <div class="col-md-4">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/2356/2356780.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="#">ERP & Pengembangan Aplikasi</a></h5>
            <p class="small text-center">Proyek sistem perencanaan sumber daya perusahaan untuk efisiensi bisnis dan manajemen data.</p>
          </div>
        </div>

        <!-- Pengembangan Aplikasi -->
        

        <!-- Data Mining -->
        <div class="col-md-4 mx-auto">
          <div class="card p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/4762/4762316.png" width="80" class="mx-auto mb-3">
            <h5 class="text-center"><a href="#">Data Mining</a></h5>
            <p class="small text-center">Analisis dan ekstraksi pola dari data besar untuk pengambilan keputusan berbasis data.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>© 2025 Portofolio PBL | Teknik Informatika | Polibatam</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
