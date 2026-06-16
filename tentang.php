<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍽️ Aroma Catering - Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fcfbf7; 
            color: #333;
        }

        .navbar {
            background-color: #1a1a1a !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 24px;
            color: #ffc107 !important; 
            letter-spacing: 1px;
        }
        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }

        footer {
            background-color: #111 !important;
            border-top: 4px solid #ffc107;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .contact-page-section {
            min-height: 85vh;
            padding: 80px 20px;
            text-align: center;
            box-sizing: border-box;

            background: linear-gradient(
                    rgba(17, 17, 17, 0.75),
                    rgba(17, 17, 17, 0.75)
                ),
                url('https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=1200');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .contact-page-section h2 {
            color: white;
            font-size: 42px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .contact-subtitle {
            color: #dddddd;
            margin-bottom: 50px;
            font-size: 18px;
        }

        .contact-grid {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap; 
        }

        .contact-card {
            width: 300px;
            padding: 40px 30px;
            background: rgba(255, 255, 255, 0.08); 
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-sizing: border-box;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 193, 7, 0.5); /* Efek kilau emas terarah */
            box-shadow: 0 20px 40px rgba(255, 193, 7, 0.2);
        }

        .contact-card .icon {
            font-size: 45px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .contact-card h3 {
            color: #ffc107; 
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: 600;
        }

        .contact-card p {
            margin: 0;
            padding: 0;
        }

        .contact-card p a {
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.6;
            transition: color 0.3s ease;
            display: inline-block;
            word-break: break-all; 
        }

        .contact-card p a:hover {
            color: #ffc107 !important; 
            text-decoration: underline;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">🍽️ Aroma Catering</a>
    <div class="navbar-nav ms-auto">
      <a class="nav-link active" href="index.php">Home</a>
      <a class="nav-link" href="menu.php">Menu</a>
      <a class="nav-link" href="tentang.php">Tentang Kami</a>
      <a class="nav-link" href="kontak.php">Kontak</a>
      <a class="nav-link btn btn-sm btn-outline-light ms-2 px-3 text-white" href="admin/dashboard.php">Admin</a>
    </div>
  </div>
</nav>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>Kisah Aroma Catering</h2>
            <p class="mt-3">Berdiri sejak tahun 2020, Aroma Catering berkomitmen untuk menghadirkan kuliner nusantara dan internasional dengan standar kualitas hotel berbintang namun harga tetap bersahabat.</p>
            <p>Kami melayani berbagai kebutuhan event seperti pernikahan, seminar corporate, syukuran, hingga penyediaan makan siang harian kantor karyawan (lunch box).</p>
            <p>Visi utama kami adalah menjadi mitra kuliner terpercaya yang mengedepankan cita rasa autentik dan kebersihan mutlak.</p>
        </div>
        <div class="col-md-6 bg-light p-5 rounded text-center">
            <h3>Visi & Misi</h3>
            <p class="fst-italic">"Menyajikan kebahagiaan di setiap meja makan melalui hidangan yang diolah sepenuh hati."</p>
        </div>
    </div>
</div>

</body>
</html>