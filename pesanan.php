<?php
// Pastikan session dimulai di bagian paling atas berkas
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. LOGIKA MENANGKAP TOMBOL PESAN DARI MENU.PHP ATAU TOMBOL TAMBAH (+) DI TABEL
if (isset($_GET['menu']) && isset($_GET['harga'])) {
    $menu = trim($_GET['menu']);
    $harga = (int)$_GET['harga'];

    if (!isset($_SESSION['pesanan'])) {
        $_SESSION['pesanan'] = [];
    }

    // Jika item sudah ada di daftar, naikkan jumlahnya (+1)
    if (isset($_SESSION['pesanan'][$menu])) {
        $_SESSION['pesanan'][$menu]['jumlah'] += 1;
    } else {
        // Jika belum ada, buat baris baru dengan jumlah awal 1
        $_SESSION['pesanan'][$menu] = [
            'harga' => $harga,
            'jumlah' => 1
        ];
    }
    
    header("Location: pesanan.php");
    exit();
}

// 2. LOGIKA MENGURANGI JUMLAH ITEM DECREMENT (-)
if (isset($_GET['kurang'])) {
    $menu_kurang = trim($_GET['kurang']);
    if (isset($_SESSION['pesanan'][$menu_kurang])) {
        $_SESSION['pesanan'][$menu_kurang]['jumlah'] -= 1;
        
        if ($_SESSION['pesanan'][$menu_kurang]['jumlah'] <= 0) {
            unset($_SESSION['pesanan'][$menu_kurang]);
        }
    }
    header("Location: pesanan.php");
    exit();
}

// 3. LOGIKA MENGHAPUS SALAH SATU ITEM SECARA TOTAL
if (isset($_GET['hapus'])) {
    $menu_hapus = trim($_GET['hapus']);
    unset($_SESSION['pesanan'][$menu_hapus]);
    header("Location: pesanan.php");
    exit();
}

// 4. LOGIKA MENGOSONGKAN SELURUH KERANJANG
if (isset($_GET['kosongkan'])) {
    unset($_SESSION['pesanan']);
    header("Location: pesanan.php");
    exit();
}

// 5. LOGIKA MEMPROSES FORM DATA PEMBELI, SIMPAN KE DATABASE, DAN DIALIHKAN KE WA
if (isset($_POST['kirim_order'])) {
    include 'koneksi.php'; // Hubungkan ke database

    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $no_hp = mysqli_real_escape_string($koneksi, trim($_POST['no_hp']));
    $alamat = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    
    // Hitung total akhir
    $total_akhir = 0;
    foreach ($_SESSION['pesanan'] as $nama_menu => $detail) {
        $total_akhir += ($detail['harga'] * $detail['jumlah']);
    }

    // A. Masukkan data ke tabel 'orders' termasuk kolom no_hp baru
    $query_order = "INSERT INTO orders (nama_pemesan, no_hp, alamat, tanggal_pengambilan, jam_pengambilan, total_bayar) 
                    VALUES ('$nama', '$no_hp', '$alamat', '$tanggal', '$jam', '$total_akhir')";
    
    if (mysqli_query($koneksi, $query_order)) {
        // Ambil ID Nota yang barusan terbuat otomatis
        $order_id = mysqli_insert_id($koneksi);

        // B. Masukkan rincian item makanan ke tabel 'order_items'
        $teks_menu = "";
        foreach ($_SESSION['pesanan'] as $nama_menu => $detail) {
            $harga = $detail['harga'];
            $jumlah = $detail['jumlah'];
            $subtotal = $harga * $jumlah;

            $query_items = "INSERT INTO order_items (order_id, nama_menu, harga_satuan, jumlah, subtotal) 
                            VALUES ('$order_id', '$nama_menu', '$harga', '$jumlah', '$subtotal')";
            mysqli_query($koneksi, $query_items);

            $teks_menu .= " ▪️ " . $nama_menu . " (" . $jumlah . "x) - Rp " . number_format($subtotal, 0, ',', '.') . "\n";
        }

        // Format tanggal Indonesia untuk teks WA
        $hari_array = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $hari_index = date('w', strtotime($tanggal));
        $nama_hari = $hari_array[$hari_index];
        $tanggal_indo = date('d-m-Y', strtotime($tanggal));

        // C. Susun Nota Pesanan untuk WhatsApp (Ditambahkan No HP aktif)
        $pesan_wa = "*🧾 NOTA PESANAN - AROMA CATERING*\n\n";
        $pesan_wa .= "*👤 DATA PEMBELI:*\n";
        $pesan_wa .= " Nama: " . $nama . "\n";
        $pesan_wa .= " No. HP Aktif: " . $no_hp . "\n";
        $pesan_wa .= " Alamat Kirim: " . $alamat . "\n\n";
        $pesan_wa .= "*📅 JADWAL PENGAMBILAN:*\n";
        $pesan_wa .= " Hari/Tgl: " . $nama_hari . ", " . $tanggal_indo . "\n";
        $pesan_wa .= " Jam Pick-up: " . $jam . " WIB\n\n";
        $pesan_wa .= "*🛒 RINCIAN MENU:*\n" . $teks_menu . "\n";
        $pesan_wa .= "*💰 TOTAL PEMBAYARAN:* Rp " . number_format($total_akhir, 0, ',', '.') . "\n\n";
        $pesan_wa .= "Pesanan sudah masuk sistem web. Segera diproses admin, Terima kasih! 🙏";

        $nomor_admin = "6285701398297"; 
        $link_wa = "https://wa.me/" . $nomor_admin . "?text=" . urlencode($pesan_wa);
        
        // Kosongkan keranjang belanja
        unset($_SESSION['pesanan']);

        // Redirect membuka WhatsApp
        header("Location: " . $link_wa);
        exit();
    } else {
        echo "Gagal menyimpan pesanan: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛒 Daftar Pesanan - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #fcfbf7; color: #333; }
        .navbar { background-color: #1a1a1a !important; padding: 15px 0; }
        .navbar-brand { color: #ffc107 !important; }
        .table-container, .form-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .qty-btn { padding: 2px 10px; font-weight: bold; font-size: 14px; text-decoration: none; border-radius: 5px; }
        .form-label { font-weight: 500; color: #444; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">🍽️ Aroma Catering</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link text-white fw-medium" href="menu.php">← Tambah Menu Lagi</a>
    </div>
  </div>
</nav>

<div class="container my-5">
    <h2 class="fw-bold mb-4">🛒 Daftar Pesanan Kuliner Anda</h2>

    <div class="table-container mb-5">
        <?php if (!empty($_SESSION['pesanan'])): ?>
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah (Qty)</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $total_akhir = 0;
                    foreach ($_SESSION['pesanan'] as $nama_menu => $detail): 
                        $subtotal = $detail['harga'] * $detail['jumlah'];
                        $total_akhir += $subtotal;
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><strong><?= htmlspecialchars($nama_menu); ?></strong></td>
                        <td class="text-end">Rp <?= number_format($detail['harga'], 0, ',', '.'); ?></td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <a href="pesanan.php?kurang=<?= urlencode($nama_menu); ?>" class="btn btn-sm btn-outline-secondary qty-btn">-</a>
                                <span class="fw-bold fs-6 mx-1"><?= $detail['jumlah']; ?>x</span>
                                <a href="pesanan.php?menu=<?= urlencode($nama_menu); ?>&harga=<?= $detail['harga']; ?>" class="btn btn-sm btn-outline-warning qty-btn text-dark">+</a>
                            </div>
                        </td>
                        <td class="text-end fw-semibold text-success">Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                        <td class="text-center">
                            <a href="pesanan.php?hapus=<?= urlencode($nama_menu); ?>" class="btn btn-sm btn-danger px-3" onclick="return confirm('Hapus hidangan ini dari daftar?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <tr class="table-light">
                        <td colspan="4" class="text-end fw-bold fs-5">Total Pembayaran:</td>
                        <td class="text-end fw-bold fs-5 text-white" style="background: #1a1a1a;">Rp <?= number_format($total_akhir, 0, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-3">
                <a href="pesanan.php?kosongkan=1" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda ingin membatalkan semua pesanan?')">🗑️ Kosongkan Keranjang</a>
            </div>

        <?php else: ?>
            <div class="text-center py-5">
                <p class="fs-4 text-muted mb-3">Daftar pesanan Anda masih kosong.</p>
                <a href="menu.php" class="btn btn-warning px-4 py-2 fw-semibold">Lihat & Pilih Menu</a>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($_SESSION['pesanan'])): ?>
    <div class="form-container">
        <h3 class="fw-bold text-dark mb-4" style="border-left: 5px solid #ffc107; padding-left: 15px;">📝 Formulir Konfirmasi Pengambilan</h3>
        
        <form action="pesanan.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap Pemesan</label>
                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama Anda..." required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nomor WhatsApp / HP Aktif</label>
                    <input type="tel" name="no_hp" class="form-control form-control-lg" placeholder="Contoh: 0857xxxxxx" pattern="[0-9]{9,15}" title="Masukkan nomor HP berupa angka 9-15 digit" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Alamat / Lokasi Pengiriman</label>
                    <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Contoh: Jl. Diponegoro No. 99, Krajan" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Pengambilan / Pengiriman</label>
                    <input type="date" name="tanggal" class="form-control form-control-lg" min="<?= date('Y-m-d'); ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jam Pengambilan (WIB)</label>
                    <input type="time" name="jam" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" name="kirim_order" class="btn btn-success btn-lg px-5 fw-bold shadow-sm">
                    🟢 Konfirmasi & Kirim ke WhatsApp Admin
                </button>
            </div>
        </form>
    </div>
    <?php endif; ?>
</div>

</body>
</html>