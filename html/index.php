<?php
// Pastikan tidak ada spasi atau baris kosong sebelum tag <?php di atas
session_start();

// Data login admin
$admin_email = "admin@quicktune.com";
$admin_pass  = "admin123";

// Cek jika ada pengiriman form login
if (isset($_POST['login_admin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        echo "<script>alert('Login Berhasil!'); window.location='indexadmin.php';</script>";
        exit;
    } else {
        echo "<script>alert('Email atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickTune</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <!--Swipper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>    
    <!-- Box Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<!-- Navbar -->
<header>
    <a href="#" class="logo"><img src="../img/logo.png" alt="">QuickTune</a>
    <div class="bx bx-menu" id="menu-icon"></div>
    <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#category">Promo</a></li>
        <li><a href="#recipe">Booking</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><span onclick="bukaModal()" class="admin-btn"><i class='bx bx-user-circle'></i> Admin</span></li>
    </ul>
</header>

<!-- Home -->
<section class="home" id="home">

    <div class="home-text">
        <span>Selamat Datang</span>
        <h1>QuickTune</h1>

        <p class="subtitle">
            Gak Pake Antri, Gak Pake Ribet.<br>
            Booking Karaoke Cepat & Aman, Langsung Check-In!
        </p>
    </div> 

    <div class="home-image">
        <img src="../assets/background-home.jpeg" alt="Karaoke Illustration">
    </div>

</section>

<div id="loginModal">
    <div class="modal-content">
        <span class="close-btn" onclick="tutupModal()">&times;</span>
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email Admin" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login_admin" class="btn-login-submit">Login Now</button>
        </form>
    </div>
</div>

<!--Kategori-->
<section class="section-container category-container" id="category">
  <div class="category-title">
    <h2>Promo Meriah QuickTune</h2>
    <p>Temukan promo menarik di QuickTune</p>
  </div>
  <div class="category-grid">
    <a href="../html/promoweekly.html" class="category-link">
      <div class="category-card">
        <img src="../img/promoweekly.png" alt="category" />
        <h4>Promo Weekly</h4>
      </div>
    </a>
    <a href="../html/promobulanan.html" class="category-link">
      <div class="category-card">
        <img src="../img/promobulanan2.png" alt="category" />
        <h4>Promo Bulanan Desember</h4>
      </div>
    </a>
    <a href="../html/promochristmas.html" class="category-link">
      <div class="category-card">
        <img src="../img/promochristmas.png" alt="category" />
        <h4>Promo Christmas</h4>
      </div>
    </a>
    <a href="../html/promoakhirtahun.html" class="category-link">
      <div class="category-card">
        <img src="../img/promonewyear.png" alt="category" />
        <h4>Promo Akhir Tahun</h4>
      </div>
    </a>
  </div>
</section>

<!-- Resep -->
       <section class="recipe" id="recipe">
    <div class="recipe-container">
        <h2 class="recipe-title">Pilih Ruangan</h2>
        <p class="recipe-subtitle">
            Pilih Ruanganmu, Cek Slot Waktu Real Time<br>
            Temukan Ruangan yang Cocok untuk Mood Kamu
        </p>
        
        <div class="room-grid">
            <a href="../html/booking.html?type=bronze" class="room-card bronze">
                <div class="overlay">
                    <h2 class="room-name">Bronze Room</h2>
                </div>
            </a>

            <a href="../html/booking.html?type=silver" class="room-card silver">
                <div class="overlay">
                    <h2 class="room-name">Silver Room</h2>
                </div>
            </a>

            <a href="../html/booking.html?type=gold" class="room-card gold">
                <div class="overlay">
                    <h2 class="room-name">Gold Room</h2>
                </div>
            </a>

            <a href="../html/booking.html?type=platinum" class="room-card platinum">
                <div class="overlay">
                    <h2 class="room-name">Platinum Room</h2>
                </div>
            </a>
        </div>
    </div>
</section>
    </div>
</section>

<!--Testimoni-->
<section class="testimonials" id="testimonials">
    <div class="testimonials-header">
        <h2>Testinomial</h2>
        <p>Apa kata pelanggan setia QuickTune tentang pengalaman karaoke mereka.</p>
    </div>

    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Andi+P&background=random" alt="User">
                <div class="user-details">
                    <h4>Andi Pratama</h4>
                    <span>Mahasiswa</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
            <p>"Gak perlu antri lagi! Booking lewat QuickTune beneran praktis. Sampai lokasi langsung masuk room tanpa ribet."</p>
        </div>

        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Budi+S&background=random" alt="User">
                <div class="user-details">
                    <h4>Budi Santoso</h4>
                    <span>Karyawan Swasta</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star-half'></i>
                    </div>
                </div>
            </div>
            <p>"Sistemnya transparan banget, harga room dan jam tayangnya real-time. Sangat membantu buat acara kantor!"</p>
        </div>

        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Citra+L&background=random" alt="User">
                <div class="user-details">
                    <h4>Citra Lestari</h4>
                    <span>Influencer</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
            <p>"Suka banget sama promo Christmas-nya kemarin! UI aplikasinya juga enak dilihat dan gampang dipakai buat booking mendadak."</p>
        </div>

        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Diana+P&background=random" alt="User">
                <div class="user-details">
                    <h4>Diana Putri</h4>
                    <span>Ibu Rumah Tangga</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
            <p>"Anak-anak senang banget karaoke di sini. Booking Bronze Room buat 2 jam langsung dapet konfirmasi via email."</p>
        </div>

        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Eko+W&background=random" alt="User">
                <div class="user-details">
                    <h4>Eko Wijaya</h4>
                    <span>Freelancer</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bx-star'></i>
                    </div>
                </div>
            </div>
            <p>"Metode pembayarannya lengkap banget. Habis bayar dapet QR code buat check-in. Benar-benar sesuai namanya, Quick!"</p>
        </div>

        <div class="testimonial-card">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name=Fani+K&background=random" alt="User">
                <div class="user-details">
                    <h4>Fani Kurnia</h4>
                    <span>Content Creator</span>
                    <div class="stars">
                        <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
            <p>"Tempatnya bersih dan sistem bookingnya modern. Gak bakal pindah ke tempat lain deh."</p>
        </div>
    </div>
</section>

<!--Kritik dan saran
<section class="top-section-wrapper">
    <div class="get-in-touch-card-container">
        <div class="get-in-touch-card">
            <h3 class="card-title">Kritik dan Saran</h3>
            <p class="card-subtitle">Subscribe us to get in touch and enjoy discounts, promos and much more!</p>
            <form class="subscribe-form">
                <input type="email" placeholder="Enter your email." required>
                <button type="submit" class="subscribe-btn-white">Kirim</button>
            </form>
        </div>
    </div>
  </section>-->

<footer>
    <div class="footerContainer" id="contact">
        <h2 class="footer-title">QuickTune</h2>
        <p class="footer-description">
          QuickTune menghadirkan pemesanan ruangan karaoke yang cepat, praktis, dan transparan. Nikmati hiburan tanpa ribet, kapan pun Anda mau. Musik siap, momen seru pun dimulai!
        </p>
        
        <div class="socialIcons">
            <a href="#"><i class='bx bxl-facebook-circle'></i></a>
            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-youtube'></i></a>
        </div>
        
        <div class="footerBottom">
            <p>Copyright &copy; QuickTune</p>
        </div>
    </div>
</footer>

<!--<footer class="main-footer-v1">
        <div class="container-v1">
            
            <div class="footer-grid-final">
                
                <div class="footer-col footer-brand-v1">
                    <a href="#" class="logo-v1">QuickTune</a>
                    <p class="tagline-v1">Develop your skills in a new and unique way.</p>
                    <div class="social-icons-v1">
                        <a href=""><i class='bx bxl-facebook-circle' ></i></i></a>
                        <a href=""><i class='bx bxl-instagram-alt' ></i></i></a>
                        <a href=""><i class='bx bxl-twitter' ></i></i></a>
                        <a href=""><i class='bx bxl-youtube' ></i></i></a>
                    </div>
                </div>
                
                <div class="footer-col footer-contact-v1">
                    <h3>Contact Us</h3>
                    <p>+91 (000) 123-4567</p>
                    <p>etech@gmail.com</p>
                </div>
                
            </div>
            
            
            
        </div>
        
        <div class="footer-bottom-v1">
            <p>Copyright © 2025 QuickTune</p>
        </div>
    </div>
</footer>-->
<!-- footer 
<footer>
  <div class="footerContainer" id="contact">
    <h2 class="footer-title">QuickTune</h2>
    <p class="footer-description">
<<<<<<< HEAD
      QuickTune menghadirkan pemesanan ruangan karaoke yang cepat, praktis, dan transparan. Nikmati hiburan tanpa ribet, kapan pun Anda mau. Musik siap, momen seru pun dimulai!
=======
      QuickTune menghadirkan pemesanan ruangan karaoke yang cepat, praktis, dan transparan. Nikmati hiburan tanpa ribet, kapan pun Anda mau. Musik siap, momen seru pun dimulai!
>>>>>>> c45a1aca27dce7265f60fa01c120a3495591717c
    </p>
      <div class="socialIcons">
          <a href=""><i class='bx bxl-facebook-circle' ></i></i></a>
          <a href=""><i class='bx bxl-instagram-alt' ></i></i></a>
          <a href=""><i class='bx bxl-twitter' ></i></i></a>
          <a href=""><i class='bx bxl-youtube' ></i></i></a>
      </div>
      <div class="footerNav">
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="">News</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Our Team</a></li>
          </ul>
      </div>
      <div class="footerBottom">
        <p>Copyright &copy; QuickTune</p>
    </div>
  </div>
</footer>-->

<script>
    function bukaModal() {
        console.log("Membuka Modal...");
        document.getElementById("loginModal").style.display = "block";
    }

    function tutupModal() {
        document.getElementById("loginModal").style.display = "none";
    }

    // Tutup modal jika klik di luar kotak putih
    window.onclick = function(event) {
        var modal = document.getElementById("loginModal");
        if (event.target == modal) {
            tutupModal();
        }
    }
</script>
<!-- scroll top -->
  <a href="#" class="top"><i class='bx bx-up-arrow-alt'></i></a>
  <script src="https://unpkg.com/scrollreveal"></script>
<!-- link JS -->
  <script src="https://unpkg.com/scrollreveal"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="../java.js"></script>
</body>
</html>
