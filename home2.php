<?php
session_start();
 // optional kalau kamu mau pisah alert function, bisa hapus

// Contoh data login sementara
// Biasanya ini diset dari login.php
// $_SESSION['user'] = ['nama' => 'Muhammad Ihsan', 'jurusan' => 'Teknik Informatika', 'isDosen' => false];

// Logout handler
if (isset($_GET['logout'])) {
  session_destroy();
  echo "
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Logout',
      showConfirmButton: false,
      timer: 1500
    }).then(() => window.location='index.php');
  </script>";
  exit;
}

// Proteksi akses halaman tertentu
if (isset($_GET['page']) && !isset($_SESSION['user'])) {
  echo "
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script>
    Swal.fire({
      icon: 'warning',
      title: 'Login Diperlukan',
      text: 'Silakan login terlebih dahulu untuk mengakses halaman ini.',
      confirmButtonText: 'Login Sekarang',
      confirmButtonColor: '#00bfff'
    }).then(() => window.location='login.php');
  </script>";
  exit;
}

$user = $_SESSION['user'] ?? null;
$isDosen = $user['isDosen'] ?? false;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portofolio PBL - Home (Glass Style)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
/* 🔹 CSS kamu tetap sama, tidak diubah */
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
.nav-link:hover, .dropdown-item:hover { color: #00e6ff !important; }
.card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: white;
  border-radius: 20px;
  transition: 0.3s;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 15px rgba(0, 230, 255, 0.4);
}
.team-photo {
  width: 120px; height: 120px; object-fit: cover;
  border-radius: 50%; border: 3px solid rgba(255,255,255,0.5);
  box-shadow: 0 0 15px rgba(0,230,255,0.3);
  transition: 0.3s;
}
.team-photo:hover { transform: scale(1.05); box-shadow: 0 0 25px rgba(0,230,255,0.6); }
</style>
</head>
<body>
<div class="background"></div>

<!-- 🔹 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <img src="download-removebg-preview.png" alt="Logo" width="40" height="40">
      <span class="fw-bold">Portofolio PBL</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Portofolio</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Teknik Informatika.php">Teknik Informatika</a></li>
            <li><a class="dropdown-item" href="Teknik Elektro.php">Teknik Elektro</a></li>
            <li><a class="dropdown-item" href="Teknik Mesin.php">Teknik Mesin</a></li>
            <li><a class="dropdown-item" href="Manajemen Bisnis.php">Manajemen Bisnis</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>

      <form class="d-flex me-3">
        <input class="form-control rounded-pill" style="background-color:rgba(255,255,255,0.8)" type="search" placeholder="Cari...">
      </form>

      <!-- 🔹 PROFIL DROPDOWN -->
      <div class="dropdown">
        <button class="btn btn-outline-light rounded-circle p-0 border-0" type="button" data-bs-toggle="dropdown">
          <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="40" height="40" class="rounded-circle">
        </button>
        <ul class="dropdown-menu dropdown-menu-end text-center p-3" style="min-width:220px;">
          <?php if ($user): ?>
            <li class="mb-2">
              <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" height="60" class="rounded-circle border border-light">
            </li>
            <li><strong class="text-white"><?= htmlspecialchars($user['nama']) ?></strong></li>
            <li><small class="text-light"><?= htmlspecialchars($user['jurusan']) ?></small></li>
            <li><hr class="dropdown-divider border-light"></li>
            <li><a class="dropdown-item text-white" href="profil.php?page=profil">👤 Profil Saya</a></li>
            <li><a class="dropdown-item text-white" href="<?= $isDosen ? 'riwayat.php' : 'hasil.php' ?>">
              <?= $isDosen ? '📜 Riwayat Penilaian' : '📁 My Portofolio' ?>
            </a></li>
            <li><a class="dropdown-item text-white" href="?logout=1">🚪 Logout</a></li>
          <?php else: ?>
            <li><a class="dropdown-item text-white" href="login.php">🔑 Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- 🔹 HERO -->
<section class="hero position-relative text-center py-5">
  <div class="container">
    <h1>Selamat Datang di Portofolio PBL</h1>
    <p>Website ini menampilkan hasil karya dan proyek Project Based Learning sebagai dokumentasi hasil kerja tim dan inovasi mahasiswa.</p>
  </div>
</section>

<footer class="text-center py-3" style="background:rgba(0,0,0,0.4); border-top:1px solid rgba(255,255,255,0.2);">
  <p>© 2025 Portofolio PBL | Polibatam | All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
