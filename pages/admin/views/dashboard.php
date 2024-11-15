<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <style>
      :root {
        --body-small-font-family: "DM Sans", Helvetica;
        --body-small-font-size: 16px;
        --body-small-font-style: normal;
        --body-small-font-weight: 400;
        --body-small-letter-spacing: 0.5px;
        --body-small-line-height: 24px;
        --m3-label-medium-font-family: "Roboto", Helvetica;
        --m3-label-medium-font-size: 12px;
        --m3-label-medium-font-style: normal;
        --m3-label-medium-font-weight: 500;
        --m3-label-medium-letter-spacing: 0.5px;
        --m3-label-medium-line-height: 16px;
        --m3-title-medium-font-family: "Roboto", Helvetica;
        --m3-title-medium-font-size: 16px;
        --m3-title-medium-font-style: normal;
        --m3-title-medium-font-weight: 500;
        --m3-title-medium-letter-spacing: 0.15000000596046448px;
        --m3-title-medium-line-height: 24px;
        --neutral-10: rgba(72, 98, 132, 1);
        --neutral-2: rgba(222, 229, 237, 1);
        --background-color: #d9d9d9;
        --sidebar: #ffffff;
        --semibold-60-font-family: "Poppins", Helvetica;
        --semibold-60-font-size: 60px;
        --semibold-60-font-style: normal;
        --semibold-60-font-weight: 600;
        --semibold-60-letter-spacing: 0px;
        --semibold-60-line-height: 30px;
      }

      body,
      html {
        height: 100%;
        margin: 0;
        font-family: "Poppins", sans-serif;
      }

      .container {
        display: flex;
        min-height: 100vh;
      }

      .sidebar {
        width: 374px;
        background-color: var(--sidebar);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
      }

      .sidebar-header {
        margin-left: 51px;
      }

      .sidebar-header img {
        width: 200px;
        height: 83px;
        margin-top: 41px;
        margin-bottom: 50px;
      }

      .sidebar-nav {
        flex-grow: 1;
      }

      .sidebar nav {
        display: flex;
        flex-direction: column;
      }

      .sidebar nav a {
        text-decoration: none;
        position: relative;
        color: #000000;
        display: flex;
        align-items: center;
        text-decoration: none;
        padding: 10px;
        margin-bottom: 30px;
        border-radius: 5px;
        font-size: 20px;
        font-weight: 500;
      }

      .sidebar nav a::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50%;
        border-bottom: 2px solid #15a3a1;
        transition: width 0.3s;
        opacity: 0;
      }

      .sidebar nav a:hover::after {
        opacity: 1;
        width: 50%;
      }

      .sidebar nav i {
        margin-right: 10px;
      }

      .sidebar nav .icon {
        width: 40px;
        height: 40px;
        margin-left: 65px;
        margin-right: 32px;
      }

      /* Main Content */
      .main-content {
        width: calc(100% - 374px);
        background-color: var(--background-color);
      }

      .main-content h1 {
        padding: 25px;
        font-size: 36px;
        font-weight: 600;
        margin: 0;
      }

      .main-content h2 {
        padding: 20px;
        margin: 0;
      }

      .line {
        width: 100%;
        height: 1px;
        background-color: black;
      }

      .main-content .button {
        border: 2px solid #000000;
        background-color: transparent;
        color: black;
        padding: 12px 30px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 22px;
        margin-top: 47px;
        transition: 0.3s;
        font-size: 24px;
        font-weight: 500;
      }

      .dashboard {
        display: grid;
        grid-template-columns: repeat(2, 500px);
        gap: 52px;
        border-radius: 12px;
        padding: 47px;
        justify-content: center;
        justify-items: center;
      }

      table {
        width: 100%;
        background-color: #e5e7eb;
      }

      .table-container {
        background-color: #1a1a1a;
        padding: 30px;
        border-radius: 10px;
        width: 976px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        width: 88%;
      }

      .main-content table {
        border-collapse: collapse;
        background-image: url("assets/rectangle-1499.svg");
        background-size: cover;
        background-position: center;
      }

      table th,
      table td {
        padding: 15px;
      }

      .main-content table,
      .main-content table th,
      .main-content table td {
        border: 1px solid #e5e7eb;
      }

      .overlap-group-1 {
        background-color: #2c8577;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .overlap-group-2 {
        background-color: #1e888c;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .overlap-group-3 {
        background-color: #8fc8a5;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .overlap-group-4 {
        background-color: #245044;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .overlap-group-5 {
        background-color: #216c68;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .overlap-group-6 {
        background-color: #2c8577;
        border-radius: 12px;
        height: 123px;
        position: relative;
        width: 386px;
      }

      .groups-fill {
        height: 80px;
        left: 24px;
        position: absolute;
        top: 24px;
        width: 80px;
      }

      .groups {
        height: 63px;
        left: 24px;
        position: absolute;
        top: 24px;
        width: 62px;
      }

      .text {
        color: #ffffff;
        font-family: "Poppins-Medium", Helvetica;
        font-size: 20px;
        font-weight: 500;
        height: 34px;
        left: 0;
        letter-spacing: 0;
        line-height: 24px;
        position: absolute;
        text-align: center;
        top: 13px;
        width: 386px;
      }

      .text-wrapper {
        color: #ffffff;
        font-family: var(--semibold-60-font-family);
        font-size: var(--semibold-60-font-size);
        font-style: var(--semibold-60-font-style);
        font-weight: var(--semibold-60-font-weight);
        height: 42px;
        left: 97px;
        letter-spacing: var(--semibold-60-letter-spacing);
        line-height: var(--semibold-60-line-height);
        position: absolute;
        text-align: center;
        top: 54px;
        width: 192px;
      }

      .text1 {
        color: #ffffff;
        font-family: "Poppins-Medium", Helvetica;
        font-size: 20px;
        font-weight: 500;
        height: 34px;
        left: 0;
        letter-spacing: 0;
        line-height: 24px;
        position: absolute;
        text-align: center;
        top: 13px;
        width: 386px;
      }

      .text-wrapper1 {
        color: #ffffff;
        font-family: var(--semibold-60-font-family);
        font-size: var(--semibold-60-font-size);
        font-style: var(--semibold-60-font-style);
        font-weight: var(--semibold-60-font-weight);
        height: 42px;
        left: 97px;
        letter-spacing: var(--semibold-60-letter-spacing);
        line-height: var(--semibold-60-line-height);
        position: absolute;
        text-align: center;
        top: 75px;
        width: 192px;
      }

      footer {
        background-image: url(assets/bg-footer.png);
        color: white;
        padding: 30px;
      }

      footer .icon {
        width: 20px;
        vertical-align: middle;
        margin-right: 8px;
      }

      footer .grid {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
      }

      footer .footer-logo {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 100px;
        font-size: 14px;
      }

      footer .footer-logo img {
        width: 180px;
        height: 82px;
        margin-bottom: 10px;
      }
  
      footer .grid div {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex: 1;
        margin-bottom: 20px;
        text-align: left;
        margin-left: 40px;
      }

      footer .siswa h3 {
        font-size: 20px;
        text-align: left;
      }

      footer .siswa li,
      footer .instruktur li {
        font-size: 14px;
        text-align: left;
        align-self: flex-start;
        width: 200px;
      }

      footer .grid a {
        color: white;
        text-decoration: none;
      }

      footer .grid a:hover {
        text-decoration: none;
      }

      ul {
        padding: 0;
        list-style-type: none;
        font-size: 14px;
      }

      li {
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="sidebar-header">
          <img alt="Logo" src="assets/django-3.png" />
        </div>
        <div class="sidebar">
          <nav>
            <a href="#">
              <img src="assets/dashboard.png" alt="Profil Logo" class="icon" />
              <p>Dashboard</p>
            </a>
            <a href="#">
              <img src="assets/siswa.png" alt="Login Logo" class="icon" />
              <p>Siswa</p>
            </a>
            <a href="#">
              <img src="assets/pengajar.png" alt="Register Logo" class="icon" />
              <p>Pengajar</p>
            </a>
            <a href="#">
              <img
                src="assets/persetujuan-penarikan.png"
                alt="Instructor Logo"
                class="icon"
              />
              <p>Persetujuan Penarikan</p>
            </a>
            <a href="#">
              <img
                src="assets/setting.png"
                alt="Pengaturan Logo"
                class="icon"
              />
              <p>Pengaturan</p>
            </a>
            <a href="#">
              <img src="assets/keluar.png" alt="Pengaturan Logo" class="icon" />
              <p>Keluar</p>
            </a>
          </nav>
        </div>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <h1>Selamat Datang, Admin!</h1>
        <div class="line"></div>
        <button class="button">Statistik Utama</button>

        <div class="dashboard">
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-1">
                <div class="text">Total Pengajar</div>
                <div class="text-wrapper">0</div>
                <img
                  class="groups-fill"
                  alt="Groups fill"
                  src="assets/groups-2-fill-streamline-rounded-fill-material-symbols.svg"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-2">
                <div class="text">Total Siswa</div>
                <div class="text-wrapper">0</div>
                <img
                  class="groups-fill"
                  alt="Groups fill"
                  src="assets/image-4.png"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-3">
                <div class="text">Total Kursus</div>
                <div class="text-wrapper">0</div>
                <img
                  class="groups-fill"
                  alt="Groups fill"
                  src="assets/book-2-fill-streamline-rounded-fill-material-symbols.svg"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-4">
                <div class="text">Pendaftaran Hari Ini</div>
                <div class="text-wrapper">0</div>
                <img
                  class="groups-fill"
                  alt="Groups fill"
                  src="assets/image-5.png"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-5">
                <div class="text1">
                  Kursus Baru <br />
                  Menunggu Persetujuan
                </div>
                <div class="text-wrapper1">0</div>
                <img
                  class="groups"
                  alt="Groups fill"
                  src="assets/one-finger-hold-streamline-core-remix.svg"
                />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="overlap-group-wrapper">
              <div class="overlap-group-6">
                <div class="text">Permintaan Penarikan</div>
                <div class="text-wrapper">0</div>
                <img
                  class="groups-fill"
                  alt="Groups fill"
                  src="assets/image-6.png"
                />
              </div>
            </div>
          </div>
        </div>

        <button class="button">Ringkasan Aktivitas Terbaru</button>

        <h2>Kursus Baru</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Nama Pengajar</th>
                <th>Kelas</th>
                <th>Tingkat</th>
                <th>Judul</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Adwin</td>
                <td>Soft Skills</td>
                <td>Menengah</td>
                <td>Meningkatkan Keterampilan Pemrograman</td>
              </tr>
              <tr>
                <td>Charles</td>
                <td>Mobile Development</td>
                <td>Mudah</td>
                <td>Dasar-Dasar Pengembangan Aplikasi Mobile</td>
              </tr>
              <tr>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h2>Siswa Baru</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Nama Siswa</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sarah</td>
                <td>sarah@gmail.com</td>
              </tr>
              <tr>
                <td>Farel</td>
                <td>farel@gmail.com</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h2>Permintaan Penarikan Dana</h2>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Nama Pengajar</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Adwin</td>
                <td>Rp100.000</td>
              </tr>
              <tr>
                <td>Guy Hanswin</td>
                <td>Rp200.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="grid">
        <div class="footer-logo">
          <img alt="Logo" src="assets/django-3.png" />
          <p>
            Django adalah platform edukasi yang menyediakan kursus untuk mengembangkan keterampilan di berbagai bidang teknologi. 
            Kami siap membantu Anda menguasai teknologi dengan pendekatan yang praktis dan bimbingan ahli.
          </p>
        </div>
        <div class="instruktur">
          <h3>Instruktur</h3>
          <ul>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
            <li><a href="#">Instructor</a></li>
            <li><a href="#">Dashboard</a></li>
          </ul>
        </div>
        <div class="siswa">
          <h3>Siswa</h3>
          <ul>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Jelajahi Kursus</a></li>
            <li><a href="#">Wishlist Kursus</a></li>
            <li><a href="#">Student</a></li>
            <li><a href="#">Dashboard</a></li>
          </ul>
        </div>
        <div class="alamat">
          <h3>Alamat</h3>
          <ul>
            <li>
              <img src="assets/icon-20-svg.svg" alt="Lokasi" class="icon" />
              Jalan Gelatik, Samarinda
            </li>
            <li>
              <img src="assets/icon-19-svg.svg" alt="Email" class="icon" />
              <a href="mailto:admin@django.com">admin@django.com</a>
            </li>
            <li>
              <img src="assets/icon-21-svg.svg" alt="Telepon" class="icon" />
              +48 731 819 948
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
