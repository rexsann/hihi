<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Kata Sandi</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2b1055, #7597de);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .forgot-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(25px);
      border-radius: 20px;
      padding: 45px 40px;
      color: #fff;
      width: 400px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
      text-align: center;
    }

    .forgot-card h2 {
      font-weight: 700;
      margin-bottom: 15px;
    }

    .forgot-card p {
      font-size: 14px;
      color: #d9e6ff;
      margin-bottom: 25px;
      line-height: 1.5;
    }

    .form-control {
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.9);
      border: none;
      padding: 11px 14px;
      font-size: 15px;
      transition: 0.3s;
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
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: scale(1.04);
      opacity: 0.95;
    }

    .back-text {
      margin-top: 20px;
      font-size: 13px;
      color: #cce7ff;
    }

    .back-text a {
      color: #00bfff;
      text-decoration: none;
      font-weight: 600;
    }

    .back-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .forgot-card {
        width: 90%;
        padding: 35px 25px;
      }
      .forgot-card h2 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="forgot-card">
        <h2>Lupa Kata Sandi</h2>
        <p>Masukkan No. Telepon Anda. Kami akan mengirimkan kode verifikasi untuk mengatur ulang kata sandi Anda.</p>

        <form>
          <div class="mb-3 text-start">
            <label for="telepon" class="form-label fw-semibold">No. Telepon</label>
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan No. Telepon" required>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Temukan</button>

          <div class="back-text">
            Kembali ke <a href="login.php">Halaman Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
