<?php
include '../koneksi.php'; // Hubungkan ke database utama

// A. LOGIKA PROSES TAMBAH MENU BARU
if (isset($_POST['tambah_menu'])) {
    $nama_menu = mysqli_real_escape_string($koneksi, trim($_POST['nama_menu']));
    $harga     = (int)$_POST['harga'];
    $deskripsi = mysqli_real_escape_string($koneksi, trim($_POST['deskripsi']));

    if (!empty($nama_menu) && $harga > 0) {
        // Query memasukkan data hidangan ke tabel produk/menu Anda
        // Catatan: sesuaikan nama tabel 'menu' dan kolomnya dengan database bawaan Anda jika berbeda
        $query = "INSERT INTO menu (nama_menu, harga, deskripsi) VALUES ('$nama_menu', '$harga', '$deskripsi')";
        mysqli_query($koneksi, $query);
    }
    header("Location: menu_crud.php");
    exit();
}

// B. LOGIKA PROSES HAPUS MENU
if (isset($_GET['hapus_id'])) {
    $id_hapus = (int)$_GET['hapus_id'];
    mysqli_query($koneksi, "DELETE FROM menu WHERE id = $id_hapus");
    header("Location: menu_crud.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍔 Kelola Menu - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .sidebar { background-color: #1a1a1a; min-height: 100vh; color: white; padding-top: 20px; }
        .sidebar .nav-link { color: #ccc; margin: 5px 0; padding: 12px 20px; border-radius: 5px; }
        .sidebar .nav-link.active { background-color: #ffc107; color: black; font-weight: 600; }
        .sidebar .nav-link:hover:not(.active) { background-color: #2a2a2a; color: white; }
        .main-content { padding: 40px; }
        .card-custom { background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 25px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR NAVIGATION -->
        <div class="col-md-2 sidebar d-none d-md-block">
            <div class="px-3 mb-4">
                <h4 class="fw-bold text-warning mb-0">Aroma Admin</h4>
                <small class="text-muted">Manajemen Katering</small>
            </div>
            <nav class="nav flex-column px-2">
                <a class="nav-link" href="dashboard.php">📦 Pesanan Masuk</a>
                <a class="nav-link active" href="menu_crud.php">🍔 Kelola Menu</a>
                <hr style="border-color: #444;">
                <a class="nav-link text-danger" href="../index.php">Logout Ke Web ←</a>
            </nav>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="col-md-10 main-content">
            <h2 class="fw-bold mb-1">Kelola Daftar Menu Hidangan</h2>
            <p class="text-muted mb-4">Tambah makanan baru atau hapus menu katering yang sudah tidak tersedia.</p>

            <div class="row g-4">
                <!-- FORM TAMBAH MENU -->
                <div class="col-md-4">
                    <div class="card-custom">
                        <h4 class="fw-bold mb-3 text-dark">➕ Tambah Menu</h4>
                        <form action="menu_crud.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nama Makanan / Paket</label>
                                <input type="text" name="nama_menu" class="form-control" placeholder="Contoh: Nasi Box Ayam Bakar" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Harga Satuan (Rp)</label>
                                <input type="number" name="harga" class="form-control" placeholder="Contoh: 25000" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Deskripsi / Isi Paket</label>
                                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Nasi, Ayam, Sambal, Lalapan..."></textarea>
                            </div>
                            <button type="submit" name="tambah_menu" class="btn btn-warning w-100 fw-bold mt-2">Simpan ke Menu</button>
                        </form>
                    </div>
                </div>

                <!-- TABEL DAFTAR MENU -->
                <div class="col-md-8">
                    <div class="card-custom">
                        <h4 class="fw-bold mb-3 text-dark">📋 Menu Aktif Saat Ini</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" style="width: 70px;">No</th>
                                        <th>Nama Kuliner</th>
                                        <th>Deskripsi Komponen</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mengambil rincian masakan di database
                                    $no = 1;
                                    $query_menu = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY id DESC");
                                    
                                    if (mysqli_num_rows($query_menu) > 0):
                                        while ($menu = mysqli_fetch_assoc($query_menu)):
                                    ?>
                                    <tr>
                                        <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                                        <td><strong class="text-dark"><?= htmlspecialchars($menu['nama_menu']); ?></strong></td>
                                        <td class="text-muted small"><?= htmlspecialchars($menu['deskripsi']); ?></td>
                                        <td class="text-end fw-semibold text-primary">Rp <?= number_format($menu['harga'], 0, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <a href="menu_crud.php?hapus_id=<?= $menu['id']; ?>" 
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Apakah Anda yakin ingin menghapus hidangan <?= htmlspecialchars($menu['nama_menu']); ?>?')">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        endwhile;
                                    else:
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">Belum ada makanan terdaftar di database.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>