<?php
session_start();

// Memeriksa apakah data menu dan harga dikirim melalui URL
if (isset($_GET['menu']) && isset($_GET['harga'])) {
    $menu = $_GET['menu'];
    $harga = (int)$_GET['harga']; // Mengubah ke bentuk angka integer

    // Jika session pesanan belum ada, buat array baru
    if (!isset($_SESSION['pesanan'])) {
        $_SESSION['pesanan'] = [];
    }

    // Jika menu sudah pernah dipesan sebelumnya, tambahkan jumlahnya (Quantity)
    if (isset($_SESSION['pesanan'][$menu])) {
        $_SESSION['pesanan'][$menu]['jumlah'] += 1;
    } else {
        // Jika belum ada, masukkan data baru ke dalam list pesanan
        $_SESSION['pesanan'][$menu] = [
            'harga' => $harga,
            'jumlah' => 1
        ];
    }
}

// Setelah sukses menyimpan ke session, langsung arahkan ke halaman daftar pesanan
header("Location: daftar_pesanan.php");
exit();
?>