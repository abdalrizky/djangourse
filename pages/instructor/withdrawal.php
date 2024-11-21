<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0"/>
    <title>Instructor View - Dashboard</title>
      <link rel="shortcut icon" href="../../assets/img/django-3.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/withdrawal.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
    <div id="main-structure">
      <header>
        <div class="navbar">
            <img src="../../assets/img/logo-django.png" alt="Logo" class="logo" style="  width: 110px; ">
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pages/student/course-list.php">Kursus</a></li>
                    <li><a href="#">Cara Penggunaan</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <button class="style-daftar" onclick="location.href='pages/auth.php'">Daftar</button>
                <button class="style-masuk" onclick="location.href='pages/auth.php'">Masuk</button>
            </div>
        </div>
    </header>
      <div class="hero-section">
        <h2>Pengajar</h2>
        <h5>beranda - Kursus Saya</h5>
      </div>
      <div class="main-content">
        <div class="side">
          <div class="profile">
            <img src="./assets/stock.jpg" alt="" />
            <div class="names">
              <div class="profile-name">
                <h2>Bersiaplah, M. Pd</h2>
              </div>
              <div class="profile-title">
                <h5>Instruktur</h5>
              </div>
            </div>
            <button class="add-course">Tambah Kursus</button>
          </div>
          <div class="navigation">
            <ul>
              <li class="section-title">Dashboard</li>
              <li>
               <!-- icon fontawesome -->
               <a href="./dashboard.php"> <i class="fas fa-tachometer-alt"></i> Dashboard </a>
              </li>
              <li>
                <a href="./myprofile.php"> <i class="fas fa-user-circle"></i> Profil Saya </a>
              </li>
              <li class="section-title">Pengajar</li>
              <li>
                <a href="./mycourse.php"> <i class="fas fa-book-open"></i> Kursus Saya </a>
              </li>
              <li>
                <a href="./withdrawal.php"> <i class="fas fa-money-bill-wave"></i> Tarik Saldo </a>
              </li>
              <!-- <li>
                <a href="#"> <i class="fas fa-feather-alt"></i> Percobaan Kuis </a>
              </li>
              <li>
                <a href="#"> <i class="fas fa-tasks"></i> Tugas </a>
              </li> -->
              <li class="section-title">Pengaturan Akun</li>
              <li>
                <a href="./editprofile.php"> <i class="fas fa-edit"></i> Edit Profil </a>
              </li>
              <li>
                <a href="./change-password.php"> <i class="fas fa-key"></i> Ubah Password</a>
              </li>
              <li>
                <a href="./withdrawal-record.php"> <i class="fas fa-wallet"></i> Penarikan </a>
              </li>
              <li>
                <a href="#"> <i class="fas fa-sign-out-alt"></i> Keluar </a>
                <!-- icon fontawesome -->
              </li>
            </ul>
          </div>
        </div>
        <div class="right-content">
            <div class="header">
                <h2>Pilih Metode Penarikan</h2>
            </div>
            <div class="interlude"></div>
            <div class="wrapper">
                <div class="withdrawal-options">
                    <h1>Pilih Metode Penarikan</h1>
                    <div class="method">
                        <label>
                            <input type="radio" name="withdrawal-method" value="paypal" class="withdrawal-radio" />
                            <span>Pembayaran PayPal</span>
                        </label>
                    </div>
                    <div class="method">
                        <label>
                            <input type="radio" name="withdrawal-method" value="dana" class="withdrawal-radio" />
                            <span>Dana</span>
                        </label>
                    </div>
                </div>
                
                <div class="form-container">
                    <form id="paypal-form" class="withdrawal-form hidden">
                        <div class="form-group">
                            <label for="paypal-email">Surel</label>
                            <input type="email" id="paypal-email" name="paypal-email" placeholder="Masukkan email PayPal Anda" required />
                        </div>
                        <p>Kami akan menggunakan alamat email ini untuk mengirimkan uang ke akun PayPal Anda.</p>
                        <button type="submit" class="submit-btn">Simpan Akun Penarikan</button>
                    </form>
                
                    <form id="dana-form" class="withdrawal-form hidden">
                        <div class="form-group">
                            <label for="dana-number">Nomor DANA</label>
                            <input type="text" id="dana-number" name="dana-number" placeholder="Masukkan nomor DANA Anda" required />
                        </div>
                        <p>Kami akan menggunakan nomor ini untuk mengirimkan uang ke akun DANA Anda.</p>
                        <button type="submit" class="submit-btn">Simpan Akun Penarikan</button>
                    </form>
                </div>    
            </div>        
        </div>            
    </div>
    <!-- Footer -->
    <footer>
        <div class="grid">
            <div class="footer-logo">
                <img alt="Logo" src="../../../assets/img/django-3.png" />
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                    consequat mauris.
                </p>
            </div>
            <div>
                <h3>Instruktur</h3>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Instructor</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
            <div>
                <h3>Siswa</h3>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Jelajahi Kursus</a></li>
                    <li><a href="#">Wishlist Kursus</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
            <div>
                <h3>Alamat</h3>
                <p>Jalan Gelatik, Samarinda</p>
                <p><a href="mailto:admin@django.com">admin@django.com</a></p>
                <p>+48 731 819 948</p< /div>
            </div>
      </div>
    </footer>
	<script src="./scripts/withdrawal.js"></script>
  </body>
</html>