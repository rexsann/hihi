<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Portofolio PBL</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2b1055, #7597de);
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    /* ✨ Efek cahaya latar belakang */
    .glow-bg {
      position: absolute;
      width: 500px;
      height: 500px;
      border-radius: 50%;
      filter: blur(120px);
      background: radial-gradient(circle, rgba(0,230,255,0.5), transparent 70%);
      animation: floating 6s ease-in-out infinite alternate;
    }

    .glow-bg:nth-child(2) {
      background: radial-gradient(circle, rgba(255,0,255,0.4), transparent 70%);
      bottom: -100px;
      right: -150px;
      animation-delay: 2s;
    }

    @keyframes floating {
      0% { transform: translate(0, 0); }
      100% { transform: translate(-40px, -30px); }
    }

    /* 🧊 Kartu login glass */
    .card-glass {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.25);
      backdrop-filter: blur(25px);
      border-radius: 25px;
      padding: 40px;
      width: 400px;
      box-shadow: 0 0 25px rgba(0,230,255,0.2);
      text-align: center;
      position: relative;
      z-index: 10;
      animation: fadeInUp 1s ease forwards;
      transform: translateY(20px);
      opacity: 0;
    }

    @keyframes fadeInUp {
      to { transform: translateY(0); opacity: 1; }
    }

    .card-glass img {
      width: 70px;
      margin-bottom: 10px;
      filter: drop-shadow(0 0 8px rgba(0,230,255,0.5));
    }

    h3 {
      font-weight: 700;
      text-shadow: 0 0 10px rgba(0,230,255,0.4);
    }

    /* 🧠 Input form */
    .input-group-custom {
      position: relative;
      margin-bottom: 20px;
    }

    input.form-control {
      background: rgba(255,255,255,0.2);
      border: 1px solid rgba(255,255,255,0.4);
      color: white;
      border-radius: 50px;
      padding: 10px 45px 10px 15px;
      text-align: center;
      transition: 0.3s;
      width: 100%;
    }

    input.form-control::placeholder {
      color: rgba(255,255,255,0.7);
    }

    input.form-control:focus {
      border-color: #00e6ff;
      box-shadow: 0 0 10px rgba(0,230,255,0.4);
      background: rgba(255,255,255,0.3);
      outline: none;
    }

    /* 👁️ Tombol lihat password */
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #00e6ff;
      font-size: 20px;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #fff;
      text-shadow: 0 0 6px #00e6ff;
    }

    /* 🚀 Tombol login */
    .btn-custom {
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      border: none;
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.3s;
      box-shadow: 0 0 15px rgba(0,230,255,0.3);
    }

    .btn-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 25px rgba(0,230,255,0.6);
      background: linear-gradient(135deg, #0072ff, #00c6ff);
    }

    /* 🔗 Link bawah */
    .link-group {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      font-size: 14px;
    }

    a {
      color: #00e6ff;
      text-decoration: none;
      transition: 0.2s;
    }

    a:hover {
      color: #fff;
      text-shadow: 0 0 5px #00e6ff;
    }

    /* 🔄 Loading text */
    .loading {
      display: none;
      font-size: 14px;
      margin-top: 10px;
      color: #00e6ff;
    }

    /* ⚡ Modern alert modal */
    .alert-glass {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(0,0,0,0.4);
      backdrop-filter: blur(5px);
      z-index: 999;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.4s ease;
    }

    .alert-glass.active {
      opacity: 1;
      pointer-events: all;
    }

    .alert-box {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.25);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 30px 40px;
      text-align: center;
      color: white;
      width: 320px;
      box-shadow: 0 0 20px rgba(0,230,255,0.2);
      transform: scale(0.8);
      transition: 0.3s;
    }

    .alert-glass.active .alert-box {
      transform: scale(1);
    }

    .alert-box i {
      font-size: 40px;
      margin-bottom: 10px;
      display: block;
    }

    .alert-box.success i { color: #00ffcc; }
    .alert-box.error i { color: #ff4b4b; }
    .alert-box.warning i { color: #ffcc00; }

    .alert-box button {
      margin-top: 15px;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      border: none;
      border-radius: 25px;
      color: white;
      padding: 8px 20px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .alert-box button:hover {
      background: linear-gradient(135deg, #0072ff, #00c6ff);
      box-shadow: 0 0 10px rgba(0,230,255,0.5);
    }
  </style>
</head>
<body>
  <div class="glow-bg" style="top: -150px; left: -150px;"></div>
  <div class="glow-bg"></div>

  <div class="card-glass">
    <img src="download-removebg-preview.png" alt="Logo Polibatam">
    <h3 class="mb-4">Login Akun</h3>

    <form id="loginForm">
      <div class="input-group-custom">
        <input type="text" id="nim" class="form-control" placeholder="Masukkan NIM/NIK" required>
      </div>

      <div class="input-group-custom">
        <input type="password" id="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
        <i class="bi bi-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn btn-custom w-100 py-2">Masuk</button>
      <div class="loading" id="loadingText">🔄 Sedang memverifikasi...</div>
    </form>

    <div class="link-group">
      <a href="register.php">Daftar di sini</a>
      <a href="lupapw.php">Lupa Password?</a>
    </div>
  </div>

  <!-- 💬 Modern Alert -->
  <div class="alert-glass" id="customAlert">
    <div class="alert-box" id="alertBox">
      <i class="bi bi-info-circle"></i>
      <h5 id="alertTitle">Judul</h5>
      <p id="alertMessage">Pesan</p>
      <button id="alertBtn">Oke</button>
    </div>
  </div>

  <script>
  // 🔐 Kalau udah login, langsung ke home
  if (localStorage.getItem("currentUser")) {
    window.location.href = "home.php";
  }

  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");
  const customAlert = document.getElementById("customAlert");
  const alertBox = document.getElementById("alertBox");
  const alertTitle = document.getElementById("alertTitle");
  const alertMessage = document.getElementById("alertMessage");
  const alertBtn = document.getElementById("alertBtn");

  // 👁️ Toggle password visibility
  togglePassword.addEventListener("click", () => {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    togglePassword.classList.toggle("bi-eye");
    togglePassword.classList.toggle("bi-eye-slash");
  });

  // 💬 Custom alert popup
  function showAlert(type, title, message, callback) {
    alertBox.className = "alert-box " + type;
    alertTitle.textContent = title;
    alertMessage.textContent = message;
    const icon = alertBox.querySelector("i");
    icon.className = type === "success" ? "bi bi-check-circle" :
                     type === "error" ? "bi bi-x-circle" :
                     "bi bi-exclamation-circle";
    customAlert.classList.add("active");
    alertBtn.onclick = () => {
      customAlert.classList.remove("active");
      if (callback) callback();
    };
  }

  // 🚀 LOGIN HANDLER
  document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const nim = document.getElementById("nim").value.trim();
    const password = document.getElementById("password").value.trim();
    const loading = document.getElementById("loadingText");

    // ✅ Daftar akun dosen
    const daftarDosen = [
      { id: "D001", password: "dosen123", nama: "Dosen 1", jurusan: "Teknik Informatika" },
      { id: "D002", password: "pbl2025", nama: "Dosen 2", jurusan: "Teknik Multimedia" },
      { id: "ADMIN", password: "admin", nama: "Administrator", jurusan: "Admin Sistem" }
    ];

    // 🔍 Cek dosen
    const dosen = daftarDosen.find(d => d.id.toUpperCase() === nim.toUpperCase() && d.password === password);

    if (dosen) {
      loading.style.display = "block";
      localStorage.setItem("isDosen", "true");
      localStorage.setItem("currentUser", JSON.stringify(dosen));
      setTimeout(() => {
        loading.style.display = "none";
        showAlert("success", "Login Dosen Berhasil", "Selamat datang, " + dosen.nama + " 👨‍🏫", () => {
          window.location.href = "home.php";
        });
      }, 1000);
      return;
    }

    // 🔍 Cek mahasiswa
    const userData = localStorage.getItem("user_" + nim);
    if (!userData) {
      showAlert("error", "Akun Tidak Ditemukan", "Silakan daftar terlebih dahulu.");
      return;
    }

    const user = JSON.parse(userData);
    if (user.password !== password) {
      showAlert("warning", "Kata Sandi Salah", "Periksa kembali kata sandi Anda.");
      return;
    }

    // 🧑‍🎓 Login mahasiswa
    loading.style.display = "block";
    localStorage.setItem("isDosen", "false");
    localStorage.setItem("currentUser", JSON.stringify(user));
    setTimeout(() => {
      loading.style.display = "none";
      showAlert("success", "Login Berhasil", "Selamat datang, " + user.nama + " 🎉", () => {
        window.location.href = "home.php";
      });
    }, 1000);
  });
  </script>

</body>
</html>
