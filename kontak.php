<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hubungi Kami - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Aroma Catering</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="index.php">Home</a>
      <a class="nav-link" href="menu.php">Menu</a>
      <a class="nav-link" href="tentang.php">Tentang Kami</a>
      <a class="nav-link active" href="kontak.php">Kontak</a>
    </div>
  </div>
</nav>

<div class="container my-5">
    <h2 class="text-center mb-4">Hubungi Hubungi / Pesan</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" placeholder="08xxxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan / Detail Pesanan</label>
                        <textarea class="form-control" rows="4" placeholder="Tuliskan jenis menu dan tanggal acara Anda..." required></textarea>
                    </div>
                    <button type="submit" name="kirim" class="btn btn-warning w-100 fw-bold">Kirim ke WhatsApp</button>
                </form>
                
                <?php 
                if(isset($_POST['kirim'])){
                    // Simulasi respon sukses, bisa diarahkan langsung API WhatsApp jika dibutuhkan
                    echo "<div class='alert alert-success mt-3 text-center'>Terima kasih! Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>