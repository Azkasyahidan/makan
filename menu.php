<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️ Aroma Catering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Aroma Catering</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="index.php">Home</a>
      <a class="nav-link active" href="menu.php">Menu</a>
      <a class="nav-link" href="tentang.php">Tentang Kami</a>
      <a class="nav-link" href="kontak.php">Kontak</a>
      <a class="nav-link nav-admin-btn ms-2 px-3" href="admin/dashboard.php">Admin</a>
    </div>
  </div>
</nav>

    <!-- BAGIAN MENU -->
    <section class="menu-section" id="menu">
        <div class="section-title">
            <h2>Aneka Snack</h2>
        </div>

        <div class="menu-container">
            <div class="card">
                <img src="image/asets/Espresso.jpg">
                <div class="card-body">
                    <h3>Espresso</h3>
                    <p>Kopi pekat dengan aroma kuat.</p>
                    <span>Rp 20.000</span>
                    <a href="pesan.php?menu=Espresso&harga=20000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>


    <section class="menu-section" id="menu">
        <div class="section-title">
            <h2>Aneka Nasi Box</h2>
        </div>

        <div class="menu-container">
            <div class="card">
                <img src="image/asets/Espresso.jpg">
                <div class="card-body">
                    <h3>Espresso</h3>
                    <p>Kopi pekat dengan aroma kuat.</p>
                    <span>Rp 20.000</span>
                    <a href="pesan.php?menu=Espresso&harga=20000" class="order-btn">Pesan</a>
                </div>
            </div>
        </div>

    <section class="menu-section" id="menu">
        <div class="section-title">
            <h2>Aneka Prasmanan</h2>
            <div class="card">
                <img src="image/asets/Nugget.jpg">
                <div class="card-body">
                    <h3>Nugget</h3>
                    <span>Rp 15.000</span>
                    <a href="pesan.php?menu=Nugget&harga=15000" class="order-btn">Pesan</a>
                </div>
            </div>

        </div>    
    </section>

    <footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2026 Aroma Catering. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>