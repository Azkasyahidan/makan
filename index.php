<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️ Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Mengubah font utama agar lebih modern, bersih, dan estetik */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fcfbf7; /* Warna latar belakang putih hangat/krem tipis */
            color: #333;
        }

        /* Gaya Khusus Navbar */
        .navbar {
            background-color: #1a1a1a !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 24px;
            color: #ffc107 !important; /* Warna aksen emas khas kuliner */
            letter-spacing: 1px;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }

        /* Banner Utama (Hero Section) dengan Background Gambar Makanan Premium */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), 
                        url('https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200') no-repeat center center;
            background-size: cover;
            padding: 100px 20px !important;
            color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .hero-section h1 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .hero-section p {
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        /* Desain Tombol Menjadi Melengkung & Berefek Glow */
        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #111;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
        }
        .btn-warning:hover {
            background-color: #e0a800;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.6);
            color: #111;
        }

        /* Kartu Fitur Unggulan Interaktif (Dapat Melayang Saat Di-hover) */
        .feature-box {
            background: white;
            padding: 40px 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-bottom: 4px solid transparent;
            height: 100%;
        }
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-bottom: 4px solid #ffc107;
        }
        .feature-box h4 {
            font-weight: 600;
            color: #111;
            margin-bottom: 15px;
        }

        /* Footer Kustom */
        footer {
            background-color: #111 !important;
            border-top: 4px solid #ffc107;
            font-size: 14px;
            letter-spacing: 0.5px;
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

<div class="container my-4">
  <div class="hero-section text-center">
    <h1 class="display-4">Sajian Lezat untuk Momen Spesial Anda</h1>
    <p class="lead fs-5 mt-3">Aroma Catering menyediakan berbagai pilihan menu sehat, higienis, dan bercita rasa tinggi untuk segala jenis acara.</p>
    <hr class="my-4" style="border-color: rgba(255,255,255,0.3);">
    <p class="mb-4">Pesan sekarang dan rasakan kelezatan racikan bumbu khas kami.</p>
    <a class="btn btn-warning btn-lg fw-bold" href="menu.php" role="button">Lihat Menu</a>
  </div>
</div>

<div class="container my-5 py-4">
    <h2 class="text-center fw-bold mb-5">Mengapa Memilih Kami?</h2>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="feature-box">
                <h4>Bahan Segar</h4>
                <p class="text-muted mb-0">Kami selalu menggunakan bahan baku segar, pilihan, dan berkualitas tinggi demi menjaga cita rasa di setiap gigitan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h4>Koki Berpengalaman</h4>
                <p class="text-muted mb-0">Makanan diolah dan dimasak secara higienis oleh tim ahli kuliner profesional yang berpengalaman.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h4>Tepat Waktu</h4>
                <p class="text-muted mb-0">Sistem manajemen pengiriman kami memastikan pesanan tiba dengan aman sebelum acara Anda dimulai.</p>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2026 Aroma Catering. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>