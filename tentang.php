<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Warna dasar cadangan jika gambar gagal dimuat */
            color: #ffffff;
            margin: 0;
            padding-top: 70px; /* Menghindari konten tertutup navbar fixed-top */
        }

        /* 🌟 PERBAIKAN BACKGROUND: Menggabungkan gambar dengan gradasi gelap agar tidak monoton */
        .about-section {
            position: relative;
            background: linear-gradient(135px, rgba(18, 18, 18, 0.9), rgba(30, 24, 18, 0.85)), 
                        url('img/banner.jpg'); /* Pastikan file & folder gambar ini sesuai */
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Membuat efek parallax saat di-scroll */
            min-height: calc(100vh - 126px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 0;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        /* 💎 KARTU TRANSPARAN GLASSMORPHISM PREMIUM */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            height: 100%;
            transition: all 0.4s ease;
        }

        /* Efek interaktif saat kursor diarahkan ke kartu */
        .glass-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 193, 7, 0.3); /* Outline kuning tipis saat hover */
            box-shadow: 0 20px 40px rgba(255, 193, 7, 0.1);
        }

        .text-warning-custom {
            color: #ffc107 !important;
        }

        .sub-title {
            color: #e0e0e0;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Footer Kaki Halaman */
        footer {
            background-color: #0d0d0d;
            border-top: 2px solid #ffc107;
            padding: 15px 0;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
  <div class="container-fluid px-4">
    
    <a class="navbar-brand fw-bold text-warning d-flex align-items-center gap-2" href="index.php">
      <span>🍽️</span> Aroma Catering
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavigasiAroma" aria-controls="menuNavigasiAroma" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="menuNavigasiAroma">
      <div class="navbar-nav ms-auto gap-3 pt-3 pt-lg-0 align-items-lg-center">
        <a class="nav-link text-white" href="index.php">Home</a>
        <a class="nav-link text-white-50" href="menu.php">Menu</a>
        <a class="nav-link text-white-50" href="tentang.php">Tentang Kami</a>
        <a class="nav-link text-white-50" href="kontak.php">Kontak</a>
        <a class="nav-link text-white fw-bold bg-warning text-dark px-3 py-1 rounded-2 text-center mt-2 mt-lg-0 shadow-sm" href="admin/login.php">Admin</a>
      </div>
    </div>

  </div>
</nav>

<style>
  body {
    padding-top: 75px; /* Memberikan ruang agar konten utama melorot pas di bawah navbar */
  }
</style>

<section class="about-section">
    <div class="container text-center">
        <h1 class="fw-bold mb-2 display-5">Tentang Kami</h1>
        <p class="sub-title text-white-50 mb-5 fs-6">Kenali lebih dalam komitmen kami dalam mengolah rasa dan menyajikan hidangan kuliner terbaik.</p>

        <div class="row g-4 text-start justify-content-center">
            <div class="col-md-5">
                <div class="glass-card">
                    <h3 class="fw-bold text-warning-custom mb-3">📖 Kisah Aroma</h3>
                    <p class="lead fs-6 lh-lg text-white-50" style="text-align: justify;">
                        Berawal dari kecintaan terhadap cita rasa kuliner tradisional yang otentik, **Aroma Catering** hadir untuk memenuhi kebutuhan konsumsi berbagai event berharga Anda. Kami berkomitmen menyajikan hidangan higienis, lezat, dan dikelola oleh tenaga profesional.
                    </p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="glass-card">
                    <h3 class="fw-bold text-warning-custom mb-3">🎯 Komitmen Kami</h3>
                    <p class="lead fs-6 lh-lg text-white-50" style="text-align: justify;">
                        Kami selalu mengutamakan kesegaran bahan baku berkualitas tinggi dan pelayanan ramah tepat waktu. Setiap pesanan snack box, kudapan premium, hingga hidangan prasmanan diproses dengan standar kebersihan yang ketat demi kepuasan rasa Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="text-center">
    <div class="container">
        © 2026 Aroma Catering. All Rights Reserved.
    </div>
</footer>

</body>
</html>