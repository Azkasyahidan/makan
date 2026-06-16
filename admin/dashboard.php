<?php
session_start();
include '../koneksi.php';

// 1. Logika Login Sederhana (Dalam satu file agar ringkas)
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']);

    $login_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $check = mysqli_query($koneksi, $login_query);

    if (mysqli_num_rows($check) > 0) {
        $_SESSION['admin'] = $username;
    } else {
        $error = "Username atau password salah!";
    }
}

// 2. Logika Tambah Menu
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];

    mysqli_query($koneksi, "INSERT INTO menu (nama_menu, deskripsi, harga, kategori) VALUES ('$nama', '$deskripsi', '$harga', '$kategori')");
    header("Location: dashboard.php");
}

// 3. Logika Hapus Menu
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM menu WHERE id=$id");
    header("Location: dashboard.php");
}

// Tampilkan View Form Login jika belum tersambung session admin
if (!isset($_SESSION['admin'])) :
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h3 class="text-center mb-3">Admin Login</h3>
                    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-dark w-100">Masuk</button>
                    </form>
                    <a href="../index.php" class="text-center d-block mt-3 text-muted">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php else: 
// Tampilkan Halaman Dashboard jika sudah login
$menus = mysqli_query($koneksi, "SELECT * FROM menu");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Dashboard Admin</a>
    <div class="navbar-nav ms-auto">
      <span class="nav-link text-white me-3">Halo, <?= $_SESSION['admin']; ?></span>
      <a class="btn btn-sm btn-outline-light" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card p-3 shadow-sm">
                <h5>Tambah Menu Baru</h5>
                <hr>
                <form action="" method="POST">
                    <div class="mb-2">
                        <label class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="Prasmanan">Prasmanan</option>
                            <option value="Nasi Box">Nasi Box</option>
                            <option value="Tumpeng">Tumpeng</option>
                            <option value="Snack Box">Snack Box</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-success w-100">Simpan Menu</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-3 shadow-sm">
                <h5>Data Menu Catering</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while($m = mysqli_fetch_assoc($menus)): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <strong><?= $m['nama_menu']; ?></strong><br>
                                    <small class="text-muted"><?= $m['deskripsi']; ?></small>
                                </td>
                                <td><?= $m['kategori']; ?></td>
                                <td>Rp <?= number_format($m['harga'],0,',','.'); ?></td>
                                <td>
                                    <a href="dashboard.php?hapus=<?= $m['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php endif; ?>