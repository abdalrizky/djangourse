<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        --background-color: #D9D9D9;
        /* Example background color */
        --sidebar: #ffffff;
        /* Sidebar background color */
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
        margin-bottom: 67px;

    }

    .sidebar-nav {
        flex-grow: 1;
    }

    .sidebar nav {
        display: flex;
        flex-direction: column;
    }

    .sidebar nav a {
        display: flex;
        align-items: center;
        color: #374151;
        text-decoration: none;
        padding: 10px;
        margin-bottom: 50px;
        border-radius: 5px;
        font-size: 20px;
        font-weight: 500;
    }

    .sidebar nav a:hover {
        background-color: #34d399;
        color: white;
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

    .box_data_siswa {
        padding: 25px 25px 33px;
        width: 849px;
        height: 210px;
        left: 395px;
        top: 260px;
        background: rgba(0, 0, 0, 0.42);
        border-radius: 15px;
    }

    .box_status_koin {
        width: 500px;
        height: 219px;
        left: 365px;
        top: 600px;
        background: #B3B3B3;
        border-radius: 10px;
    }

    .box_payments {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0px 10px;
        gap: 43px;
        isolation: isolate;
        width: 878px;
        height: 440px;
        left: 456px;
        top: 959px;
        background: #DEE5ED;
        border-radius: 10px;

    }

    .status-pembelian-koin h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .status-box {
        background-color: #3c3c3c;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .status-box table {
        width: 100%;
        color: #000000;
        border-collapse: collapse;
    }

    .status-box th,
    .status-box td {
        padding: 10px;
        text-align: left;
    }

    .status-lunas {
        background-color: #34d399;
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }

    /* Jumlah Siswa Card */
    .card-content {
        margin-top: 130px;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #1e8881;
        /* Background color of the card */
        color: #ffffff;
        /* Text color */
        padding: 20px;
        /* Padding around the content */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
        width: 309px;
        /* Set a fixed width */
        text-align: center;
        margin-left: 30px;
    }

    .card-content img.icon {
        width: 40px;
        /* Size of the icon */
        height: auto;
        margin-bottom: 10px;
        /* Space between icon and text */
    }

    .card-content h3 {
        font-size: 18px;
        /* Font size for heading */
        margin: 0;
    }

    .card-content p {
        font-size: 40px;
        /* Font size for the number */
        margin: 10px 0 0;
        /* Margin above and below */
        font-weight: bold;
    }

    /* Pembelian Siswa Section */
    .pembelian-siswa h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .pembelian-box {
        width: 192%;
        /* Ensures the inner box also spans the full width */
        overflow-x: auto;
        background-color: #e5e7eb;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .pembelian-box table {
        width: 100%;
        border-collapse: collapse;
    }

    .pembelian-box th {
        background-color: #d1d5db;
        padding: 12px;
        text-align: left;
        font-weight: bold;
    }

    .pembelian-box td {
        padding: 20px;
        background-color: #ffffff;
        border-bottom: 1px solid #e5e7eb;
    }

    .pembelian-box small {
        color: #6b7280;
        font-size: 12px;
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

    .line {
        width: 100%;
        height: 1px;
        background-color: black;
    }

    .main-content .button {
        border: 2px solid #000000;
        background-color: transparent;
        color: #374151;
        padding: 12px 30px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 22px;
        margin-top: 47px;
        transition: 0.3s;
        font-size: 24px;
    }

    .dashboard {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        border-radius: 12px;
        padding: 20px;
    }

    .table_student_coins table {
        width: 30%;
        background-color: #e5e7eb;
        border-radius: 10px;
        margin-bottom: 30px;
        border-collapse: collapse;
    }

    .table_student_coins table th,
    table td {
        padding: 15px;
        text-align: left;
    }

    table {
        width: 100%;
        background-color: #e5e7eb;
        border-radius: 10px;
        margin-bottom: 30px;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 15px;
        text-align: left;
    }

    table th {
        background-color: #d1d5db;
    }

    table tr:nth-child(even) {
        background-color: #f9fafb;
    }

    footer {
        background-image: url(../../../assets/img/bg-footer.png);
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
    }

    footer .footer-logo img {
        width: 180px;
        height: 82px;
        margin-bottom: 10px;
    }

    footer .grid div {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        margin-bottom: 20px;
        text-align: left;
    }

    footer .siswa li,
    footer .alamat li,
    footer .instruktur li {
        text-align: left;
        align-self: flex-start;
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
    }

    li {
        margin-bottom: 20px;
    }

    .overlap-group-3 {
        background-color: #2c8577;
        border-radius: 12px;
        height: 136px;
        position: relative;
        width: 386px;
    }

    .groups-fill {
        height: 60px;
        left: 30px;
        position: absolute;
        top: 20px;
        width: 60px;
    }

    .text-wrapper-8 {
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

    .text-wrapper-9 {
        color: #ffffff;
        font-family: var(--preview-themeforest-net-poppins-semibold-60-font-family);
        font-size: var(--preview-themeforest-net-poppins-semibold-60-font-size);
        font-style: var(--preview-themeforest-net-poppins-semibold-60-font-style);
        font-weight: var(--preview-themeforest-net-poppins-semibold-60-font-weight);
        height: 42px;
        left: 97px;
        letter-spacing: var(--preview-themeforest-net-poppins-semibold-60-letter-spacing);
        line-height: var(--preview-themeforest-net-poppins-semibold-60-line-height);
        position: absolute;
        text-align: center;
        top: 54px;
        width: 192px;
    }
    </style>
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