<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/student-management.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <img alt="Logo" src="../../../assets/img/django-3.png" />
            </div>
            <div class="sidebar">
                <nav>
                    <a href="dashboard.php">
                        <img src="../../../assets/img/dashboard.png" alt="Profil Logo" class="icon" />
                        <p> Dashboard</p>
                    </a>
                    <a href="student-management.php">
                        <img src="../../../assets/img/siswa.png" alt="Login Logo" class="icon" />
                        <p>Siswa</p>
                    </a>
                    <a href="instructor-management.php">
                        <img src="../../../assets/img/pengajar.png" alt="Register Logo" class="icon" />
                        <p>Pengajar</p>
                    </a>
                    <a href="#">
                        <img src="../../../assets/img/setting.png" alt="Pengaturan Logo" class="icon" />
                        <p>Pengaturan</p>
                    </a>
                    <a href="../../logout.php">
                        <img src="../../../assets/img/keluar.png" alt="Pengaturan Logo" class="icon" />
                        <p>Keluar</p>
                    </a>
                </nav>
            </div>
        </div>
        <div class="main-content">
            <h1>Selamat Datang, Admin!</h1>
            <div class="line"></div>
            <button class="button">Data Siswa</button>
            <div class="dashboard">
                <div class="box_data_siswa">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Tanggal Akun Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>James</td>
                                <td>user@gmail.com</td>
                                <td>****</td>
                                <td>date</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>user@gmail.com</td>
                                <td>****</td>
                                <td>date</td>
                            </tr>
                            <tr>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="dashboard">
                <!-- Status Pembelian Koin Section -->
                <div class="status-pembelian-koin">
                    <button class="button" style="margin-bottom: 20px; margin-left: 0px;">Status Pembelian Koin</button>
                    <div class="status-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah Koin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>James</td>
                                    <td>20</td>
                                    <td><span class="status-lunas">Lunas</span></td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>10</td>
                                    <td><span class="status-lunas">Lunas</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="jumlah-siswa-card">
                    <div class="card-content">
                        <img src="../../../assets/img/image-4.png" alt="Icon" class="icon">
                        <h3>Jumlah Siswa</h3>
                        <p>0</p>
                    </div>
                </div>
                <div class="pembelian-siswa">
                    <button class="button" style="margin-bottom: 20px; margin-left: 0px;">Pembelian Siswa</button>
                    <div class="pembelian-box">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Pembelian</th>
                                    <th>Pengajar</th>
                                    <th>Koin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>James</td>
                                    <td>Beli Kursus: HTML<br><small>1 Oktober 2024 11:23 WITA</small></td>
                                    <td>David</td>
                                    <td>-5 Koin</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>Beli Kursus: CSS<br><small>1 Oktober 2024 11:23 WITA</small></td>
                                    <td>Adwin</td>
                                    <td>-5 Koin</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <footer style="display:inline-flex">
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