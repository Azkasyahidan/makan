<?php
session_start();
include '../koneksi.php'; 

if (isset($_SESSION['username']) && $_SESSION['status'] == "login") {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if ($password === $row['password'] || md5($password) === $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['status'] = "login";
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Latar belakang luar abu-abu terang bersih */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Efek bayangan lembut */
            border: 1px solid #eef0f2;
        }

        .brand-title {
            color: #ffc107;
            font-weight: 700;
        }

        .form-label {
            color: #495057;
            font-size: 14px;
            font-weight: 500;
        }

        .form-control {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #212529 !important; /* Memastikan tulisan ketikan berwarna gelap */
            border-radius: 10px;
            padding: 12px;
        }

        .form-control:focus {
            background: #ffffff;
            color: #212529 !important;
            border-color: #ffc107;
            box-shadow: 0 0 8px rgba(255, 193, 7, 0.2);
        }

        .btn-login {
            background-color: #ffc107;
            color: #111111;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #e0a800;
        }

        .back-link {
            color: #6c757d;
            text-decoration: none;
            font-size: 13px;
        }

        .back-link:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>

<div class="login-card text-center">
    <h3 class="brand-title mb-1">🍽️ Aroma Catering</h3>
    <p class="text-muted small mb-4">Halaman Masuk Manajemen Admin</p>

    <?php if ($error != "") : ?>
        <div class="alert alert-danger py-2 small text-center" role="alert" style="border-radius: 10px;">
            ⚠️ <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3 text-start">
            <label for="username" class="form-label">Username Admin</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required autocomplete="off">
        </div>
        
        <div class="mb-4 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" name="login" class="btn-login mb-3">Masuk Sistem</button>
    </form>

    <div class="mt-2">
        <a href="../index.php" class="back-link">← Kembali ke Halaman Utama</a>
    </div>
</div>

</body>
</html>