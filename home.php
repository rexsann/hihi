<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio PBL - Home (Glass Style)</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    h3.fw-bold {
      text-shadow: 0 0 10px rgba(0, 230, 255, 0.4);
    }

    footer {
      background: rgba(0, 0, 0, 0.4);
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      padding: 20px 0;
      text-align: center;
      color: #dbe8ff;
      backdrop-filter: blur(15px);
    }

    .team-photo {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid rgba(255,255,255,0.5);
      box-shadow: 0 0 15px rgba(0,230,255,0.3);
      transition: 0.3s;
    }

    .team-photo:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(0,230,255,0.6);
    }
  </style>
</head>
<body>
  <div class="background"></div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <img src="download-removebg-preview.png" alt="Logo" width="40" height="40">
        <span class="fw-bold">Portofolio PBL</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-3">
          <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>

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

        <!-- Profil Dropdown -->
        <div class="dropdown">
          <button class="btn btn-outline-light rounded-circle p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="40" height="40" class="rounded-circle">
          </button>
          <ul class="dropdown-menu dropdown-menu-end text-center p-3" style="min-width: 220px;">
            <li class="mb-2">
              <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" height="60" class="rounded-circle border border-light">
            </li>
            <li><strong class="text-white" id="profileName">Nama Pengguna</strong></li>
            <li><small class="text-light" id="profileJurusan">Mahasiswa</small></li>
            <li><hr class="dropdown-divider border-light"></li>
            <li><a class="dropdown-item text-white" href="profil.php">👤 Profil Saya</a></li>
            <li><a class="dropdown-item text-white" href="hasil.php" id="portoLink">📁 My Portofolio</a></li>
            <li><a class="dropdown-item text-white" href="#" id="logoutBtn">🚪 Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero position-relative">
    <div class="container">
      <h1>Selamat Datang di Portofolio PBL</h1>
      <p>Website ini menampilkan hasil karya dan proyek Project Based Learning sebagai dokumentasi hasil kerja tim dan inovasi mahasiswa.</p>
    </div>
    <div class="hero-divider"></div>
  </section>

  <!-- Proyek Unggulan -->
  <section class="py-5">
    <div class="container">
      <h3 class="fw-bold mb-4">Proyek Unggulan</h3>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card p-3 text-center">
            <h5><a href="#">Sistem Informasi Akademik</a></h5>
            <p class="small mt-2">Aplikasi untuk manajemen data mahasiswa, dosen, dan perkuliahan.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3 text-center">
            <h5><a href="#">Website UMKM</a></h5>
            <p class="small mt-2">Platform promosi digital untuk usaha menengah.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3 text-center">
            <h5><a href="#">Aplikasi Mobile Edukasi</a></h5>
            <p class="small mt-2">Aplikasi pembelajaran interaktif untuk pelajar sekolah menengah.</p>
          </div>
        </div>
      </div>

      <h3 class="fw-bold mt-5 mb-4">Kategori Proyek</h3>
      <div class="row g-4">
        <div class="col-md-3 col-6">
          <div class="card text-center p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906343.png" width="60">
            <a href="Teknik Informatika.php" class="fw-bold d-block mt-2">Teknik Informatika</a>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card text-center p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/1076/1076333.png" width="60">
            <a href="Teknik Mesin.php" class="fw-bold d-block mt-2">Teknik Mesin</a>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card text-center p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/2714/2714516.png" width="60">
            <a href="Teknik Elektro.php" class="fw-bold d-block mt-2">Teknik Elektro</a>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card text-center p-3">
            <img src="https://cdn-icons-png.flaticon.com/512/3176/3176363.png" width="60">
            <a href="Manajemen Bisnis.php" class="fw-bold d-block mt-2">Manajemen Bisnis</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tim Kami -->
  <section class="py-5 text-center">
    <div class="container">
      <h3 class="fw-bold mb-4">Tim Kami</h3>
      <div class="row g-4 justify-content-center">
        <div class="col-md-3 d-flex flex-column align-items-center">
          <img src="WhatsApp Image 2025-10-12 at 21.37.45_54559ebd.jpg" class="team-photo mb-3" alt="Muhammad Ihsan">
          <b>Muhammad Ihsan</b>
          <small class="text-light">Full Stack Manager</small>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
          <img src="foto/wulan.jpg" class="team-photo mb-3" alt="Wulan Fawwazia">
          <b>Wulan Fawwazia</b>
          <small class="text-light">Frontend Developer</small>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
          <img src="foto/rafli.jpg" class="team-photo mb-3" alt="M. Rafli Dwi Saputra">
          <b>M. Rafli Dwi Saputra</b>
          <small class="text-light">Backend Developer</small>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
          <img src="foto/iwan.jpg" class="team-photo mb-3" alt="Iwan Gayus Pasaribu">
          <b>Iwan Gayus Pasaribu</b>
          <small class="text-light">hihi</small>
        </div>
      </div>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section class="py-5 text-center">
    <div class="container">
      <h3 class="fw-bold mb-3">Tentang Kami</h3>
      <p>Tim kami terdiri dari mahasiswa yang berdedikasi dalam menciptakan solusi digital melalui pendekatan Project Based Learning (PBL). Kami percaya bahwa setiap proyek adalah peluang untuk belajar dan berinovasi.</p>
    </div>
  </section>

  <!-- Hubungi Kami -->
  <section class="py-5 text-center">
    <div class="container">
      <h3 class="fw-bold mb-3">Hubungi Kami</h3>
      <p>Email: <b>portofoliopbl@polibatam.ac.id</b></p>
      <p>Alamat: Politeknik Negeri Batam, Batam Centre</p>
    </div>
  </section>

  <footer>
    <p>© 2025 Portofolio PBL | Polibatam | All Rights Reserved</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- ✅ Script Login/Logout SweetAlert2 + Role Handling -->
  <script>
    const currentUser = JSON.parse(localStorage.getItem("currentUser"));

    // Tampilkan nama user jika login
    if (currentUser) {
      document.getElementById("profileName").textContent = currentUser.nama;
      document.getElementById("profileJurusan").textContent = currentUser.jurusan;
    }

    // Logout pop-up
    document.getElementById("logoutBtn").addEventListener("click", (e) => {
      e.preventDefault();
      if (!currentUser) {
        Swal.fire({
          icon: "info",
          title: "Belum Login",
          text: "Anda belum login ke akl.un Anda.",
          confirmButtonColor: "#00bfff"
        });
        return;
      }
      Swal.fire({
        icon: "warning",
        title: "Logout?",
        text: "Apakah Anda yakin ingin keluar?",
        showCancelButton: true,
        confirmButtonText: "Ya, Logout",
        cancelButtonText: "Batal",
        confirmButtonColor: "#e74c3c"
      }).then(result => {
        if (result.isConfirmed) {
          localStorage.removeItem("currentUser");
          Swal.fire({
            icon: "success",
            title: "Berhasil Logout",
            showConfirmButton: false,
            timer: 1500
          }).then(() => window.location.reload());
        }
      });
    });

    // Proteksi Profil & Portofolio
    document.querySelectorAll('a[href="profil.php"], a[href="hasil.php"]').forEach(link => {
      link.addEventListener("click", (e) => {
        if (!currentUser) {
          e.preventDefault();
          Swal.fire({
            icon: "warning",
            title: "Login Diperlukan",
            text: "Silakan login terlebih dahulu untuk mengakses halaman ini.",
            confirmButtonText: "Login Sekarang",
            confirmButtonColor: "#00bfff"
          }).then(() => window.location.href = "login.php");
        }
      });
    });

    // ✅ Ganti teks berdasarkan role (Mahasiswa / Dosen)
    const isDosen = localStorage.getItem("isDosen") === "true";
    const portoLink = document.getElementById("portoLink");

    if (isDosen && portoLink) {
      portoLink.textContent = "📜 Riwayat Penilaian";
      portoLink.href = "riwayat.php";
    }
  </script>
</body>
</html>
