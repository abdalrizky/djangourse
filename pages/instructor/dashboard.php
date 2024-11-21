<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0"/>
    <title>Instructor View - Dashboard</title>
      <link rel="shortcut icon" href="../../assets/img/django-3.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/instructor-dashboard.css"/>
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
        <h2>Dashboard</h2>
        <h5>beranda - Dashboardr</h5>
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
          <div class="stats">
            <div class="count-course">
              <h3>Jumlah Kursus</h3>
              <h3>0</h3>
            </div>
            <div class="count-student">
              <h3>Jumlah Kursus</h3>
              <h3>0</h3>
            </div>
            <div class="revenue">
              <h3>Jumlah Kursus</h3>
              <h3>0</h3>
            </div>
            <div class="count-approve">
              <h3>Jumlah Kursus</h3>
              <h3>0</h3>
            </div>
          </div>
          <div class="panel">
            <div class="panel-item">
              <h1>Kursus yang Baru Dibuat</h1>
              <table class="course-table">
                <thead>
                  <tr>
                    <th>Kursus</th>
                    <th>Terdafter</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"
                        />
                        <span>Kursus HTML, CSS, Javascript Lengkap</span>
                      </div>
                    </td>
                    <td>0</td>
                    <td>Menunggu Persetujuan</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"
                        />
                        <span>Informasi tentang UI/UX</span>
                      </div>
                    </td>
                    <td>1</td>
                    <td>Disetujui</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"/>
                        <span>Kursus Lengkap Pengembangan Web Berbasis Framework</span>
                      </div>
                    </td>
                    <td>1</td>
                    <td>Disetujui</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"/>
                        <span>Mengenali Assembly</span>
                      </div>
                    </td>
                    <td>1</td>
                    <td>Disetujui</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"/>
                          <span>Membuat OS Menggunakan Py </span>
                      </div>
                    </td>
                    <td>1</td>
                    <td>Disetujui</td>
                  </tr>
                  <!-- backend exho dari sini -->
                  <tr>
                    <td>
                      <div class="course-details">
                        <img
                          src="https://via.placeholder.com/50"
                          alt="Thumbnail"/>
                        <span>-</span>
                      </div>
                    </td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <!-- sampe sini -->
                </tbody>
              </table>
            </div>
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
    </footer>
  </body>
</html>
