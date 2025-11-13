<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio PBL - Contact (Glass Style)</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

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

    .contact-section {
      padding: 100px 0;
      position: relative;
      z-index: 1;
      color: white;
    }

    .contact-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      padding: 30px;
      transition: 0.3s;
    }

    .contact-card:hover {
      box-shadow: 0 0 15px rgba(0, 230, 255, 0.4);
      transform: translateY(-5px);
    }

    .form-control {
      background: rgba(255,255,255,0.2);
      border: none;
      color: white;
      border-radius: 12px;
    }

    .form-control::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .form-control:focus {
      background: rgba(255,255,255,0.3);
      color: white;
      outline: none;
      box-shadow: 0 0 10px rgba(0,230,255,0.5);
    }

    .btn-glass {
      background: rgba(255,255,255,0.2);
      border: 1px solid rgba(255,255,255,0.3);
      color: #00e6ff;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-glass:hover {
      background: rgba(0,230,255,0.3);
      color: white;
      box-shadow: 0 0 10px rgba(0,230,255,0.6);
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

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="home.html">
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
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Portofolio</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Teknik Informatika.php">Teknik Informatika</a></li>
              <li><a class="dropdown-item" href="Teknik Elektro.php">Teknik Elektro</a></li>
              <li><a class="dropdown-item" href="Teknik Mesin.php">Teknik Mesin</a></li>
              <li><a class="dropdown-item" href="Manajemen Bisnis.php">Manajemen Bisnis</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Contact</a></li>
        </ul>

        <form class="d-flex me-3">
          <input class="form-control rounded-pill" type="search" placeholder="Cari...">
        </form>

        <!-- PROFILE DROPDOWN -->
        <div class="dropdown">
          <button class="btn btn-outline-light rounded-circle p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="40" height="40" class="rounded-circle">
          </button>
          <ul class="dropdown-menu dropdown-menu-end text-center p-3" style="min-width: 220px;">
            <li class="mb-2">
              <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" height="60" class="rounded-circle border border-light">
            </li>
            <li><strong class="text-white" id="profileName">Surya Dewata</strong></li>
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

  <!-- CONTACT SECTION -->
  <section id="contact" class="contact-section">
    <div class="container">
      <div class="row justify-content-center align-items-stretch g-4">
        <div class="col-lg-5">
          <h3 class="fw-bold mb-3" style="text-shadow: 0 0 10px rgba(0,230,255,0.6);">Hubungi Kami</h3>
          <p>Jika Anda memiliki pertanyaan, saran, atau ingin bekerja sama, jangan ragu untuk menghubungi kami melalui formulir di samping.</p>

          <ul class="list-unstyled mt-4">
            <li class="mb-3"><i class="bi bi-geo-alt-fill text-info me-2"></i> Politeknik Negeri Batam, Batam Centre</li>
            <li class="mb-3"><i class="bi bi-envelope-fill text-info me-2"></i> portofoliopbl@polibatam.ac.id</li>
            <li><i class="bi bi-telephone-fill text-info me-2"></i> +62 812 3456 7890</li>
          </ul>
        </div>

        <div class="col-lg-6">
          <div class="contact-card">
            <form id="contactForm">
              <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
              </div>

              <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda di sini..." required></textarea>
              </div>

              <button type="submit" class="btn btn-glass w-100">Kirim Pesan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>© 2025 Portofolio PBL | Polibatam | All Rights Reserved</p>
  </footer>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Proteksi Login
    const currentUser = JSON.parse(localStorage.getItem("currentUser"));
    if (!currentUser) {
      Swal.fire({
        icon: "warning",
        title: "Login Diperlukan",
        text: "Silakan login terlebih dahulu untuk mengakses halaman ini.",
        confirmButtonText: "Login Sekarang",
        confirmButtonColor: "#00bfff",
        allowOutsideClick: false,
        allowEscapeKey: false
      }).then(() => window.location.href = "login.php");
    } else {
      document.getElementById("profileName").textContent = currentUser.nama || "Pengguna";
      document.getElementById("profileJurusan").textContent = currentUser.jurusan || "Mahasiswa";
    }

    // Role Dosen/Mahasiswa
    const isDosen = localStorage.getItem("isDosen") === "true";
    const portoLink = document.getElementById("portoLink");
    if (isDosen) {
      portoLink.textContent = "📜 Riwayat Penilaian";
      portoLink.href = "riwayat.php";
    } else {
      portoLink.href = "hasil.php";
    }

    // Logout
    document.getElementById("logoutBtn").addEventListener("click", (e) => {
      e.preventDefault();
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
          localStorage.removeItem("isDosen");
          Swal.fire({
            icon: "success",
            title: "Berhasil Logout",
            showConfirmButton: false,
            timer: 1500
          }).then(() => window.location.href = "login.php");
        }
      });
    });

    // Kirim pesan
    document.getElementById("contactForm").addEventListener("submit", e => {
      e.preventDefault();
      Swal.fire({
        icon: "success",
        title: "Pesan Terkirim!",
        text: "Terima kasih telah menghubungi kami 😊",
        confirmButtonColor: "#00bfff"
      });
      e.target.reset();
    });
  </script>
</body>
</html>
