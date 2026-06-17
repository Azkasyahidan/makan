<?php
session_start(); // 1. WAJIB DI TARUH DI BARIS 1: Menghubungkan atau mengaktifkan session PHP

// 2. KUNCI DASHBOARD: Jika tidak ada session login, tendang paksa ke login.php
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("Location: login.php");
    exit();
}

include '../koneksi.php'; // Hubungkan ke database utama

// Logika menghapus data pesanan dari dashboard jika admin menekan tombol selesaikan
if (isset($_GET['hapus_order'])) {
    $id_hapus = (int)$_GET['hapus_order'];
    mysqli_query($koneksi, "DELETE FROM orders WHERE id = $id_hapus");
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚙️ Dashboard Admin - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .sidebar { background-color: #1a1a1a; min-height: 100vh; color: white; padding-top: 20px; }
        .sidebar .nav-link { color: #ccc; margin: 5px 0; padding: 12px 20px; border-radius: 5px; }
        .sidebar .nav-link.active { background-color: #ffc107; color: black; font-weight: 600; }
        .sidebar .nav-link:hover:not(.active) { background-color: #2a2a2a; color: white; }
        .main-content { padding: 40px; }
        .card-table { background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); padding: 25px; }
        .badge-time { background-color: #e9ecef; color: #495057; font-weight: 500; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar d-none d-md-block">
            <div class="px-3 mb-4">
                <h4 class="fw-bold text-warning mb-0">Aroma Admin</h4>
                <small class="text-muted">Manajemen Katering</small>
            </div>
            <nav class="nav flex-column px-2">
                <a class="nav-link active" href="dashboard.php">📦 Pesanan Masuk</a>
                <a class="nav-link" href="menu_crud.php">🍔 Kelola Menu</a>
                <hr style="border-color: #444;">
                
                <a class="nav-link text-danger" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar dari sistem admin?')">Logout Ke Web ←</a>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">Daftar Pesanan Masuk</h2>
                    <p class="text-muted mb-0">Kelola dan pantau semua rincian pesanan kuliner pelanggan secara realtime.</p>
                </div>
                <button onclick="window.location.reload();" class="btn btn-outline-dark btn-sm">🔄 Refresh Data</button>
            </div>

            <div class="card-table">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 80px;">No</th>
                                <th>Pelanggan / Alamat</th>
                                <th>Jadwal Pengambilan</th>
                                <th>Rincian Hidangan (Qty)</th>
                                <th class="text-end">Total Pembayaran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_orders = mysqli_query($koneksi, "SELECT * FROM orders ORDER BY id DESC");
                            $no = 1; 

                            if (mysqli_num_rows($query_orders) > 0):
                                while ($row = mysqli_fetch_assoc($query_orders)):
                                    $order_id = $row['id']; 
                                    $tgl_ambil = date('d F Y', strtotime($row['tanggal_pengambilan']));
                                    $jam_ambil = date('H:i', strtotime($row['jam_pengambilan']));
                            ?>
                            <tr>
                                <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                                <td>
                                    <strong class="text-dark fs-6"><?= htmlspecialchars($row['nama_pemesan']); ?></strong>
                                    <?php if(!empty($row['no_hp'])): ?>
                                        <div class="text-success small fw-medium">📞 <?= htmlspecialchars($row['no_hp']); ?></div>
                                    <?php endif; ?>
                                    <div class="text-muted small mt-1" style="max-width: 250px;"><?= htmlspecialchars($row['alamat']); ?></div>
                                </td>
                                <td>
                                    <span class="badge bg-primary text-white d-block mb-1 py-1.5"><?= $tgl_ambil; ?></span>
                                    <span class="badge badge-time d-block py-1.5">🕒 Jam <?= $jam_ambil; ?> WIB</span>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 px-0">
                                        <?php
                                        $query_items = mysqli_query($koneksi, "SELECT * FROM order_items WHERE order_id = $order_id");
                                        while ($item = mysqli_fetch_assoc($query_items)):
                                        ?>
                                            <li class="small mb-1">
                                                • <?= htmlspecialchars($item['nama_menu']); ?> 
                                                <span class="fw-bold text-dark">(<?= $item['jumlah']; ?>x)</span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </td>
                                <td class="text-end fw-bold text-success fs-6">
                                    Rp <?= number_format($row['total_bayar'], 0, ',', '.'); ?>
                                </td>
                                <td class="text-center">
                                    <a href="dashboard.php?hapus_order=<?= $order_id; ?>" 
                                       class="btn btn-sm btn-success px-3 fw-medium shadow-sm" 
                                       onclick="return confirm('Tandai pesanan dari <?= htmlspecialchars($row['nama_pemesan']); ?> telah selesai diproses?')">
                                        ✔ Selesai
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                endwhile; 
                            else:
                            ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <h5 class="mb-1">Belum Ada Pesanan Masuk</h5>
                                    <p class="small mb-0">Data transaksi kuliner user yang sukses checkout akan otomatis tampil di sini.</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>