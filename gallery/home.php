<?php
session_start();
if(!isset($_SESSION['userid'])){
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Utama</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: #f9f9f9;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
}

.header {
  text-align: center;
  margin-bottom: 30px;
}

.header h1 {
  color: #007bff;
  font-size: 36px;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.header p {
  color: #333;
  font-size: 18px;
  margin-top: 10px;
}

.notice {
  background-color: #f0f0f0;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 20px;
  text-align: center;
  color: #555;
}

.menu {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.menu-item {
  margin: 10px;
  text-align: center;
}

.menu-item a {
  display: block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.menu-item a:hover {
  background-color: #0056b3;
}

.menu-item a i {
  margin-right: 10px;
  font-size: 20px;
  vertical-align: middle;
}

.menu-item a:hover i {
  animation: rotateIcon 0.5s ease-in-out infinite alternate;
}

.icon {
  margin-right: 10px;
  font-size: 20px;
  vertical-align: middle;
}

/* Gaya Tambahan */
.feature {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 30px;
}

.feature-item {
  text-align: center;
  margin: 0 20px;
  padding: 20px;
  background-color: #f0f0f0;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.feature-item:hover {
  transform: translateY(-5px);
}

.feature-item i {
  font-size: 50px;
  color: #007bff;
  margin-bottom: 10px;
}

.feature-item h3 {
  color: #333;
}

.feature-item p {
  color: #777;
  margin-top: 5px;
}

.testimonial {
  margin-top: 50px;
  text-align: center;
}

.testimonial-item {
  margin-bottom: 30px;
}

.testimonial-item i {
  font-size: 50px;
  color: #007bff;
  margin-bottom: 10px;
}

.testimonial-item p {
  font-style: italic;
  color: #555;
}

.footer {
  margin-top: 30px;
  text-align: center;
  color: #555;
}

@keyframes rotateIcon {
  to {
    transform: rotate(45deg);
  }
}
</style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Halaman Utama</h1>
      <?php if(isset($_SESSION['namalengkap'])) : ?>
        <p>Selamat datang, <b><?=$_SESSION['namalengkap']?></b></p>
      <?php else : ?>
        <p>Selamat Datang Di Halaman Web Galeri</p>
      <?php endif; ?>
    </div>
    <div class="notice">
      <div class="notice-icon">
        <i class="fas fa-lightbulb"></i>
      </div>
      <div class="notice-content">
        <h4>Tips & Trik!</h4>
        <p>Temukan tips terbaru untuk meningkatkan hasil foto Anda. Kunjungi halaman kami untuk informasi lebih lanjut.</p>
      </div>
    </div>

    <div class="menu">
      <div class="menu-item">
        <a href="index.php"><i class="icon fas fa-home"></i>Beranda</a>
      </div>
      <div class="menu-item">
        <a href="album.php"><i class="icon fas fa-images"></i>Album</a>
      </div>
      <div class="menu-item">
        <a href="foto.php"><i class="icon fas fa-camera"></i>Foto</a>
      </div>
      <div class="menu-item">
        <a href="logout.php"><i class="icon fas fa-sign-out-alt"></i>Logout</a>
      </div>
    </div>
    <div class="feature">
      <div class="feature-item">
        <i class="fas fa-users"></i>
        <h3>Komunitas</h3>
        <p>Bergabunglah dengan komunitas fotografi yang ramai.</p>
      </div>
      <div class="feature-item">
        <i class="fas fa-camera-retro"></i>
        <h3>Menangkap Momen</h3>
        <p>Jelajahi dan abadikan momen-momen tak terlupakan dengan kamera Anda.</p>
      </div>
      <div class="feature-item">
        <i class="fas fa-paint-brush"></i>
        <h3>Kreasi Artistik</h3>
        <p>Tampilkan kreasi artistik Anda dan inspirasi orang lain.</p>
      </div>
    </div>
    <div class="testimonial">
      <h2>Testimonial</h2>
      <div class="testimonial-item">
        <i class="fas fa-user"></i>
        <p>"Saya sangat senang dengan layanan yang diberikan oleh situs ini. Sangat membantu dan informatif!"</p>
        <p>- Putr* Maul***</p>
      </div>
      <div class="testimonial-item">
        <i class="fas fa-user"></i>
        <p>"Pengalaman saya menggunakan situs ini luar biasa. Terima kasih!"</p>
        <p>- Cat** Kurni****</p>
      </div>
    </div>
    <div class="footer">
      <p>Hubungi Kami: AnggaSptrss@gmail.com | Telp: +6282247338131</p>
    </div>
      </div>
</body>
</html>
