<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️ Aroma Catering - Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

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

        /* STYLING BANNER UTAMA (HERO SECTION) */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), 
                        url('https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200') no-repeat center center;
            background-size: cover;
            padding: 80px 20px !important;
            color: white;
            border-radius: 0px 0px 25px 25px; /* Membuat sudut bawah melengkung halus */
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            text-align: center;
            margin-bottom: 40px;
        }
        .hero-section h1 {
            font-weight: 700;
            color: #ffc107; /* Warna teks kuning/emas */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-size: 36px;
        }
        .hero-section p {
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
            font-size: 16px;
            color: #e0e0e0;
        }

        /* Penataan Judul Kategori Menu */
        .category-title {
            font-size: 24px;
            font-weight: 700;
            margin-top: 20px;
            margin-bottom: 25px;
            color: #111;
            position: relative;
            display: inline-block;
        }
        .category-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 4px;
            background-color: #ffc107;
            margin-top: 8px;
            border-radius: 2px;
        }

        /* Desain Kartu Menu Premium */
        .card {
            border: none !important;
            border-radius: 15px !important;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .card-body h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .card-body p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }
        .card-body span {
            font-size: 16px;
            font-weight: 700;
            color: #ffc107;
            display: block;
            margin-bottom: 15px;
        }
        
        /* Desain Tombol Pesan */
        .order-btn {
            display: block;
            background-color: #1a1a1a;
            color: white !important;
            text-align: center;
            padding: 10px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .order-btn:hover {
            background-color: #ffc107;
            color: #111 !important;
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
        <a class="nav-link text-white fw-bold bg-warning text-dark px-3 py-1 rounded-2 text-center mt-2 mt-lg-0 shadow-sm" href="admin/dashboard.php">Admin</a>
      </div>
    </div>

  </div>
</nav>

<style>
  body {
    padding-top: 75px; /* Memberikan ruang agar konten utama melorot pas di bawah navbar */
  }
</style>

<div class="hero-section">
    <div class="container">
        <h1>Daftar Menu Premium</h1>
        <p>Pilihan hidangan terbaik untuk melengkapi kebahagiaan event spesial Anda.</p>
    </div>
</div>

<div class="container mb-5">

    <h2 class="category-title">Aneka Snack</h2>
    <div class="row g-4 mb-5">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5aUreyCMc82_ObZKs1NMzl1s_m9J4C6-5cw&s" class="card-img-top" alt="Arem Arem">
                <div class="card-body">
                    <h3>Arem Arem Nasi & Mie</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Arem Arem&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRD5uH2DbFAeS7YTIcsQWnQVYTQWt5lEsa65A&s" class="card-img-top" alt="Lemper">
                <div class="card-body">
                    <h3>Lemper</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Lemper&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://allofresh.id/blog/wp-content/uploads/2023/08/resep-pastel-renyah-4-780x470.jpg" class="card-img-top" alt="Pastel">
                <div class="card-body">
                    <h3>Pastel</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Pastel&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://image.idn.media/post/20241013/1728835487463-050d7c823376e5868043b1f6ae8078e6-4e838248b16593071875261cacd27b2d.jpg" class="card-img-top" alt="Semar Mendem">
                <div class="card-body">
                    <h3>Semar Mendem</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Semar Mendem&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://img-global.cpcdn.com/recipes/06fa9f5bd32f1da5/400x400cq80/photo.jpg" class="card-img-top" alt="roll pisang">
                <div class="card-body">
                    <h3>Roll Pisang coklat</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Roll Pisang Coklat&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>

         <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvtJSPFplbbm0q4H0ZQqKKaaXyIasAh2p5YQ&s" class="card-img-top" alt="risol">
                <div class="card-body">
                    <h3>Risol</h3>
                    <span>Rp 3.000</span>
                    <a href="pesanan.php?menu=Risol&harga=3000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="category-title">Aneka Nasi Box</h2>
    <div class="row g-4 mb-5">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="image/asets/Espresso.jpg" class="card-img-top" alt="Espresso">
                <div class="card-body">
                    <h3>Espresso</h3>
                    <p>Kopi pekat dengan aroma kuat.</p>
                    <span>Rp 20.000</span>
                    <a href="pesan.php?menu=Espresso&harga=20000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="category-title">Aneka Prasmanan</h2>
    <div class="row g-4">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="image/asets/Nugget.jpg" class="card-img-top" alt="Nugget">
                <div class="card-body">
                    <h3>Nugget</h3>
                    <span>Rp 15.000</span>
                    <a href="pesan.php?menu=Nugget&harga=15000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>
    </div>

</div> <footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2026 Aroma Catering. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>