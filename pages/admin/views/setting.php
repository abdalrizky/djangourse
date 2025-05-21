<?php

session_start();

if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] !== 3) {
    header('Location: ../../auth.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Admin Djangourse</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/setting.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <img src="../../../assets/img/logo-django.png" alt="" width="120px">
            <nav>
                <ul>
                    <li><a href="dashboard.php">
                            <iconify-icon icon="material-symbols:dashboard" class="sidebar-icon"></iconify-icon>Dasbor
                        </a></li>
                    <li><a href="student-management.php">
                            <iconify-icon icon="ph:student" class="sidebar-icon"></iconify-icon>Siswa
                        </a></li>
                    <li><a href="instructor-management.php">
                            <iconify-icon icon="mdi:teacher" class="sidebar-icon"></iconify-icon>Pengajar
                        </a></li>
                    <li><a href="report.php">
                            <iconify-icon icon="mage:chart-25" class="sidebar-icon"></iconify-icon>Laporan
                        </a></li>
                    <li><a href="setting.php" class="sidebar-on">
                            <iconify-icon icon="uil:setting" class="sidebar-icon"></iconify-icon>Pengaturan
                        </a></li>
                    <li><a href="../../logout.php">
                            <iconify-icon icon="material-symbols:logout" class="sidebar-icon"></iconify-icon>Keluar
                        </a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Pengaturan</h1>
            </header>

            <section>
                <h2>Ubah Kata Sandi</h2>
                <form action="" method="post">
                    <label for="current-password">Kata Sandi Saat Ini</label>
                    <input type="password" name="current-passwor" id="current-passw" required>
                    <label for="new-password">Kata Sandi Baru</label>
                    <input type="password" name="new-password" id="new-password" required>
                    <label for="confirm-password">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" name="confirm-password" id="confirm-password" required>
                    <button type="submit">Ubah Kata Sandi</button>
                </form>
            </section>

        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
    let instructorTable = new DataTable('#instructor-data-table');
    </script>
</body>

</html>