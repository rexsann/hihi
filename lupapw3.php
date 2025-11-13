<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atur Ulang Kata Sandi</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2b1055, #7597de);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .reset-box {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(25px);
      border-radius: 20px;
      padding: 50px 40px;
      width: 100%;
      max-width: 380px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
      color: #fff;
      text-align: center;
    }

    .reset-box h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .reset-box p {
      font-size: 14px;
      color: #d9e6ff;
      margin-bottom: 30px;
    }

    .form-label {
      color: #fff;
      font-weight: 600;
      font-size: 14px;
      text-align: left;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 10px;
      padding: 11px 13px;
      font-size: 15px;
      transition: 0.3s;
    }

    .form-control:focus {
      background: #fff;
      box-shadow: 0 0 8px #00c8ff;
    }

    .input-group-text {
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 0 10px 10px 0;
      cursor: pointer;
      font-size: 18px;
    }

    .btn-primary {
      width: 100%;
      background: linear-gradient(90deg, #00bfff, #007bff);
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      transition: 0.3s;
    }

    .btn-primary:hover {
      transform: scale(1.04);
      opacity: 0.95;
    }

    .back-text {
      margin-top: 25px;
      font-size: 13px;
      color: #cce7ff;
    }

    .back-text a {
      color: #00bfff;
      font-weight: 600;
      text-decoration: none;
    }

    .back-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="reset-box">
    <h2>Atur Ulang Kata Sandi</h2>
    <p>Buat kata sandi baru untuk akun Anda. Pastikan kata sandi mudah diingat tetapi sulit ditebak.</p>

    <form action="login.html" method="post">
      <div class="mb-3 text-start">
        <label for="new-password" class="form-label">Kata Sandi Baru</label>
        <div class="input-group">
          <input type="password" class="form-control" id="new-password" placeholder="Masukkan kata sandi baru" required>
          <span class="input-group-text" onclick="togglePassword('new-password', this)">👁️</span>
        </div>
      </div>

      <div class="mb-3 text-start">
        <label for="confirm-password" class="form-label">Konfirmasi Kata Sandi</label>
        <div class="input-group">
          <input type="password" class="form-control" id="confirm-password" placeholder="Ulangi kata sandi baru" required>
          <span class="input-group-text" onclick="togglePassword('confirm-password', this)">👁️</span>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Kata Sandi</button>

      <div class="back-text">
        Kembali ke <a href="login.php">Halaman Login</a>
      </div>
    </form>
  </div>

  <!-- Script Bootstrap & Toggle Password -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword(id, el) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        el.textContent = "🙈";
      } else {
        input.type = "password";
        el.textContent = "👁️";
      }
    }
  </script>
</body>
</html>
