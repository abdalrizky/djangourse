<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0"/>
    <title>Instructor View - Dashboard</title>
      <link rel="shortcut icon" href="../../assets/img/django-3.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/withdrawal-record.css"/>
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
        <h2>Pengaturan</h2>
        <h5>beranda - Tarik Saldo</h5>
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
                <h1>Penarikan</h1>
            </div>
            <div class="sub-header">
                <div class="sub-left">
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="text">
                        <h5>Saldo Saat ini</h5>
                        <h3>Rp500.000</h3>
                    </div>
                </div>
                <div class="sub-right">
                    <button id="withdrawalBtn" class="btn btn-primary">
                        Permintaan Penarikan
                    </button>
                </div>
            </div>
            <div class="table-record">
                <div class="header-table">
                    <h2>Riwayat Penarikan</h2>
                </div>
                <table class="withdrawal-table">
                    <thead>
                    <tr>
                        <th>Metode Penarikan</th>
                        <th>Diminta Pada</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        <i class="fab fa-paypal"></i> PayPal<br />
                        adwin@gmail.com
                        </td>
                        <td>25 Oktober 2024<br />10:30 WIB</td>
                        <td>Rp. 100.000</td>
                        <td><button class="status selesai">Selesai</button></td>
                    </tr>
                    <tr>
                      <td>
                      <i class="fab fa-paypal"></i> PayPal<br />
                      adwin@gmail.com
                      </td>
                      <td>25 Oktober 2024<br />10:30 WIB</td>
                      <td>Rp. 100.000</td>
                      <td><button class="status selesai">Selesai</button></td>
                  </tr>
                  <tr>
                    <td>
                    <i class="fab fa-paypal"></i> PayPal<br />
                    adwin@gmail.com
                    </td>
                    <td>25 Oktober 2024<br />10:30 WIB</td>
                    <td>Rp. 100.000</td>
                    <td><button class="status pending">Pending</button></td>
                </tr>
                <tr>
                  <td>
                  <i class="fab fa-paypal"></i> PayPal<br />
                  adwin@gmail.com
                  </td>
                  <td>25 Oktober 2024<br />10:30 WIB</td>
                  <td>Rp. 100.000</td>
                  <td><button class="status gagal">Gagal</button></td>
              </tr>
                    <!-- Repeat rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
       <!-- Modal -->
<div id="withdrawalModal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <h2>Permintaan Penarikan</h2>
    <p>Silakan periksa notifikasi transaksi Anda pada metode penarikan yang terhubung</p>
    <div class="modal-details">
      <div class="detail">
        <span>Saldo Anda</span>
        <p>Rp500.000</p>
      </div>
      <div class="detail">
        <span>Terpilih Pembayaran</span>
        <p>PayPal</p>
      </div>
    </div>
    <form id="withdrawalForm">
      <label for="amount">Jumlah</label>
      <input type="number" id="amount" name="amount" placeholder="Rp" required />

      <div class="note">
        <p><span>&#9432;</span> Minimum tarik Rp50.000</p>
        <p><span>&#9432;</span> Batas penarikan max 3 kali dalam sehari</p>
      </div>

      <div class="modal-actions">
        <button type="submit" class="btn btn-submit">Kirim Permintaan</button>
        <!-- <button type="button" class="btn btn-cancel">Batalkan</button> -->
      </div>
    </form>
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
    <script src="./scripts/withdrawal-record.js"></script>
  </body>
</html>