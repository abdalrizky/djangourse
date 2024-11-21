<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0"/>
    <title>Instructor View - Dashboard</title>
      <link rel="shortcut icon" href="../../assets/img/django-3.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/editprofile.css"/>
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
        <h5>beranda - Edit Profil</h5>
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
				<h2>Pengaturan</h2>
				<h5>Anda memiliki kontrol penuh untuk mengelola akun Anda sendiri!</h5>
			</div>
			<div class="interlude"></div>
			<div class="content">
				<div class="img">
					<img src="./assets/stock.jpg" alt="your photo">
				</div>
				<div class="right-hand">
					<div class="headers">
						<h2>Foto Anda</h2>
						<h5>PNG atau JPG maksimal 100kb</h5>
					</div>
					<div class="icons">
						<!-- Cloud upload icon -->
						<label for="image-upload" class="icon-btn">
						  <i class="fas fa-cloud-upload-alt upload-icon"></i>
						  <input type="file" id="image-upload" accept="image/*" style="display: none;" />
						</label>
						
						<!-- Trash icon -->
						<button type="button" class="icon-btn reset-btn">
						  <i class="fas fa-trash-alt trash-icon"></i>
						</button>
					</div>					  
				</div>
			</div>
			<div class="edit-section">
				<div class="edit-header">
					<h2>Detail Pribadi</h2>
					<h4>Edit informasi pribadi anda</h4>
				</div>
				<div class="form">
					<form>
					  <!-- Row for Nama Lengkap and Tanggal Lahir -->
					  <div class="form-row">
						<div class="form-group half-width">
						  <label for="nama">Nama Lengkap</label>
						  <input type="text" id="nama" placeholder="Nama Lengkap" />
						</div>
						<div class="form-group half-width">
						  <label for="tanggal-lahir">Tanggal Lahir</label>
						  <input type="date" id="tanggal-lahir" />
						</div>
					  </div>
				  
					  <!-- Row for Email and Nomor Telepon -->
					  <div class="form-row">
						<div class="form-group half-width">
						  <label for="email">Email</label>
						  <input type="email" id="email" placeholder="Email Anda" />
						</div>
						<div class="form-group half-width">
						  <label for="nomor-telepon">Nomor Telepon</label>
						  <input type="tel" id="nomor-telepon" placeholder="+62 81234567890" />
						</div>
					  </div>
				  
					  <!-- Row for Bio -->
					  <div class="form-group">
						<label for="bio">Bio</label>
						<textarea id="bio" rows="5" placeholder="Tuliskan sesuatu tentang Anda..."></textarea>
					  </div>
				  
					  <!-- Submit Button -->
					  <div class="end">
						<button type="submit" class="submit-btn">Perbarui Profil</button>
					  </div>
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
	<script src="./scripts/editprofile.js"></script>
  </body>
</html>
