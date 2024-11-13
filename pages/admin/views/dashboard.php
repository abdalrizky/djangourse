<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/dashboard.css">
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
                        <p>Dashboard</p>
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
            <button class="button">Statistik Utama</button>

            <div class="dashboard">
                <div class="card">
                    <div class="overlap-group-wrapper">
                        <div class="overlap-group-1">
                            <div class="text">Total Pengajar</div>
                            <div class="text-wrapper">0</div>
                            <img class="groups-fill" alt="Groups fill"
                                src="../../../assets/img/groups-2-fill-streamline-rounded-fill-material-symbols.svg" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="overlap-group-wrapper">
                        <div class="overlap-group-2">
                            <div class="text">Total Siswa</div>
                            <div class="text-wrapper">0</div>
                            <img class="groups-fill" alt="Groups fill" src="../../../assets/img/image-4.png" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="overlap-group-wrapper">
                        <div class="overlap-group-3">
                            <div class="text">Total Kursus</div>
                            <div class="text-wrapper">0</div>
                            <img class="groups-fill" alt="Groups fill"
                                src="../../../assets/img/book-2-fill-streamline-rounded-fill-material-symbols.svg" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="overlap-group-wrapper">
                        <div class="overlap-group-4">
                            <div class="text">Pendaftaran Hari Ini</div>
                            <div class="text-wrapper">0</div>
                            <img class="groups-fill" alt="Groups fill" src="../../../assets/img/image-5.png" />
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
                            <img class="groups" alt="Groups fill"
                                src="../../../assets/img/one-finger-hold-streamline-core-remix.svg" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="overlap-group-wrapper">
                        <div class="overlap-group-6">
                            <div class="text">Permintaan Penarikan</div>
                            <div class="text-wrapper">0</div>
                            <img class="groups-fill" alt="Groups fill" src="../../../assets/img/image-6.png" />
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
                <img alt="Logo" src="../../../assets/img/django-3.png" />
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                    consequat mauris.
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
                        <img src="../../../assets/img/icon-20-svg.svg" alt="Lokasi" class="icon" />
                        Jalan Gelatik, Samarinda
                    </li>
                    <li>
                        <img src="../../../assets/img/icon-19-svg.svg" alt="Email" class="icon" />
                        <a href="mailto:admin@django.com">admin@django.com</a>
                    </li>
                    <li>
                        <img src="../../../assets/img/icon-21-svg.svg" alt="Telepon" class="icon" />
                        +48 731 819 948
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>