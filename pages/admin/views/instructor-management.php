<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/instructor-management.css">
    <style>
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
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
        <!-- Main Content -->
        <div class="main-content">
            <h1>Selamat Datang, Admin!</h1>
            <div class="line"></div>
            <div class="inst-count">
                <img src="../../../assets/img/total-pengajar.png" alt="">
                <h2>Jumlah Pengajar</h2>
                <h2>0</h2>  
            </div>
            <div class="inst-data">
                <div class="head">
                    <h2>Data Pengajar</h2>
                </div>
                <div class="data-table-wrapper">
                    <div class="data-table">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengajar</th>
                                <th>Email</th>
                                <th>Kursus Dibuat</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>adwin</td>
                                <td>james@gmail.com</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Charles</td>
                                <td>charles@gmail.com</td>
                                <td>2</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="transaction">
                <div class="transaction-header">
                    <h2>Persetujuan Penarikan Saldo</h2>
                </div>
                <div class="transaction-sub">
                    <h3>Nama</h3>
                    <h3>Jumlah</h3>
                    <h3>Jenis Transaksi</h3>
                    <h3>Persetujuan</h3>
                </div>
                <div class="transaction-content">
                    <div class="row">
                        <h3>Adwin</h3>
                        <h3>Rp. 100.000</h3>
                        <h3>Paypal</h3>
                        <select name="status" id="statuses" onchange="updateDropdownBackground(this)">
                            <option value="Status" selected>Status</option>
                            <option value="Setuju">Setuju</option>
                            <option value="Tolak">Tolak</option>
                        </select>
                    </div>
                    <div class="row2">
                        <h3>Adwin</h3>
                        <h3>Rp. 100.000</h3>
                        <h3>Paypal</h3>
                        <select name="status" id="statuses" onchange="updateDropdownBackground(this)">
                            <option value="Status" selected>Status</option>
                            <option value="Setuju">Setuju</option>
                            <option value="Tolak">Tolak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="course">
                <div class="course-header">
                    <h2>Persetujuan Penambahan Kursus Baru</h2>
                </div>
                <div class="course-sub">
                    <h3>Nama</h3>
                    <h3>Kelas</h3>
                    <h3>Tingkat</h3>
                    <h3>Judul</h3>
                    <h3>Harga</h3>
                    <h3>Status</h3>
                </div>
                <div class="course-content">
                    <div class="row">
                        <h3>Adwin</h3>
                        <h3>Mobile Development</h3>
                        <h3>Menengah</h3>
                        <h3>...</h3>
                        <h3>10 Koin</h3>
                        <select name="status" id="statuses" onchange="updateDropdownBackground(this)">
                            <option value="Status" selected>Status</option>
                            <option value="Setuju">Setuju</option>
                            <option value="Tolak">Tolak</option>
                        </select>
                    </div>
                    <div class="row2">
                        <h3>Charles</h3>
                        <h3>Soft Skills</h3>
                        <h3>Mudah</h3>
                        <h3>...</h3>
                        <h3>10 Koin</h3>
                        <select name="status" id="statuses" onchange="updateDropdownBackground(this)">
                            <option value="Status" selected>Status</option>
                            <option value="Setuju">Setuju</option>
                            <option value="Tolak">Tolak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="endpoint">
                <div class="left-content">
                    <div class="title">
                        <h3>Kursus Terpopuler</h3>
                        <h4>Lihat Semua Kursus</h4>
                    </div>
                    <div class="module">
                        <div class="m1">
                            <h3>HTML</h3>
                            <h4>xx modules</h4>
                            <div class="bot-right">
                                <h4>David</h4>
                            </div>
                        </div>
                        <div class="m2">
                            <h3>CSS</h3>
                            <h4>xx modules</h4>
                            <div class="bot-right">
                                <h4>Charles</h4>
                            </div>
                        </div>
                        <div class="m3">
                            <h3>JAVASCRIPT</h3>
                            <h4>xx modules</h4>
                            <div class="bot-right">
                                <h4>Adwin</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-content">
                    <h1>Pengajar Aktif</h1>
                    <img src="../../../assets/img/place_holder.png" alt="">
                    <h1>0</h1>
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
    <script src="admin-instructor.js"></script>
</body>

</html>