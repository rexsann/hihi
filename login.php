<?php
include "koneksi.php";
session_start();

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun - Portofolio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #2b1055, #7597de);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 25px;
            padding: 40px;
            width: 420px;
            color: white;
            text-align: center;
            box-shadow: 0 0 25px rgba(0, 230, 255, 0.2);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2) !important;
            border: none !important;
            color: white !important;
            border-radius: 20px !important;
            padding: 12px 15px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .btn-custom {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px;
            font-weight: 600;
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #0072ff, #00c6ff);
        }

        /* ALERT KACA */
        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(3px);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
            z-index: 9999;
            /* ADAKAN INI */
        }

        .modal-box {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 30px 40px;
            width: 380px;
            border-radius: 20px;
            text-align: center;
            color: white;
            backdrop-filter: blur(25px);
            box-shadow: 0 0 25px rgba(0, 230, 255, 0.2);
            animation: popIn 0.3s ease;
            z-index: 10000;
            /* ADAKAN INI */
        }


        .modal-box h4 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .modal-box button {
            margin-top: 15px;
            background: #00c6ff;
            border: none;
            padding: 8px 25px;
            border-radius: 15px;
            color: white;
            font-weight: bold;
        }

        .modal-box.success {
            border: 1px solid #00eaff;
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.4);
        }

        .toggle-eye {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
            user-select: none;
        }

        .toggle-eye:hover {
            color: white;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes popIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="card-glass">
        <img src="download-removebg-preview.png" width="70" class="mb-3">

        <h3 class="fw-bold mb-4">Login Akun</h3>

        <form method="POST" action="auth_system.php">
            <div class="mb-3">
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM/NIK" required>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Kata Sandi" required>

                <span class="toggle-eye" onclick="togglePassword()">
                    👁️
                </span>
            </div>


            <button type="submit" class="btn btn-custom w-100">Masuk</button>
        </form>
        <div class="mt-2 justify-content-between m">
            <a href="lupa_password.php" class="text-info me-5">Lupa Password?</a>
            <a href="register.php" class="text-info ms-5">Daftar di sini</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_SESSION['login_error'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '<?= $_SESSION['login_error'] ?>',
                timer: 1200,
                showConfirmButton: false
            });
        </script>
    <?php
        unset($_SESSION['login_error']);
    endif;
    ?>

    <script>
        function closeModal() {
            document.querySelector('.modal-bg').remove();
        }
    </script>
    <script>
        function togglePassword() {
            let pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
    </script>


</body>

</html>

