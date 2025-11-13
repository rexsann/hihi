<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Kode</title>

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

    .verify-box {
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

    .verify-box h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .verify-box p {
      font-size: 14px;
      color: #d9e6ff;
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: 600;
      text-align: left;
      color: #fff;
      font-size: 14px;
    }

    .form-control {
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.9);
      font-size: 15px;
      text-align: center;
      letter-spacing: 5px;
      padding: 11px 13px;
      transition: all 0.3s;
    }

    .form-control:focus {
      background: #fff;
      box-shadow: 0 0 8px #00c8ff;
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

  <div class="verify-box">
    <h2>Verifikasi Kode</h2>
    <p>Masukkan kode verifikasi 6 digit yang telah kami kirim ke nomor telepon Anda.</p>

    <form action="reset-password.html" method="post">
      <div class="mb-3 text-start">
        <label for="kode" class="form-label">Kode Verifikasi</label>
        <input type="text" id="kode" name="kode" maxlength="6" class="form-control" placeholder="------" required>
      </div>

      <button type="submit" class="btn btn-primary">Verifikasi</button>

      <div class="back-text mt-3">
        Tidak menerima kode? <a href="#">Kirim Ulang</a><br>
        Kembali ke <a href="login.php">Halaman Login</a>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
