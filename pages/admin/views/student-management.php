<?php

session_start();

if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] !== 3) {
    header('Location: ../../auth.php');
    exit;
}

require '../../../utils/database/helper.php';
require '../../../utils/date.php';

$students = fetch(
    "SELECT students.name, credentials.email, credentials.created_at FROM students
    JOIN credentials ON students.credential_id = credentials.id"
);

$coinTransactions = fetch(
    "SELECT students.name AS student_name, credentials.email as student_email, transactions.purchase_date, transactions.price FROM transactions
    JOIN students ON transactions.student_id = students.id
    JOIN credentials ON students.credential_id = credentials.id
    WHERE transactions.transaction_type = 'topup'
    ORDER BY transactions.purchase_date DESC"
);

$courseTransactions = fetch(
    "SELECT students.name AS student_name, courses.name AS course_name, instructors.name AS instructor_name, transactions.purchase_date FROM transactions
    JOIN students ON transactions.student_id = students.id
    JOIN courses ON transactions.course_id = courses.id
    JOIN instructors ON courses.instructor_id = instructors.id
    WHERE transactions.transaction_type = 'purchase'
    ORDER BY transactions.purchase_date DESC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa - Admin Djangourse</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/student-management.css">
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

                    <li><a href="student-management.php" class="sidebar-on">
                            <iconify-icon icon="ph:student" class="sidebar-icon"></iconify-icon>Siswa
                        </a></li>
                    <li><a href="instructor-management.php">
                            <iconify-icon icon="mdi:teacher" class="sidebar-icon"></iconify-icon>Pengajar
                        </a></li>
                    <li><a href="report.php">
                            <iconify-icon icon="mage:chart-25" class="sidebar-icon"></iconify-icon>Laporan
                        </a></li>
                    <li><a href="setting.php">
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
                <h1>Manajemen Siswa</h1>
            </header>

            <div class="divide">
            <section class="student-data-section">
                <h2>Data Siswa</h2>
                <table id="student-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Waktu Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($students) > 0) : ?>
                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td><?= $student['name'] ?></td>
                                    <td><?= $student['email'] ?></td>
                                    <td><?= convertToWita($student['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
            <section class="student-count-section">
                    <iconify-icon icon="ph:student"></iconify-icon>
                    <p class="student-counter-title">Jumlah Siswa</p>
                    <p class="student-counter"><?= count($students) ?></p>
                </section>
            </div>

                <section>
                    <h2>Status Pembelian Koin</h2>
                    <table id="koin-purchase-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Waktu Transaksi</th>
                                <th>Jumlah Koin</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (count($coinTransactions) > 0) : ?>
                            <?php foreach ($coinTransactions as $coinTransaction) : ?>
                            <tr>
                                <td><?= $coinTransaction['student_name'] ?></td>
                                <td><?= $coinTransaction['student_email'] ?></td>
                                <td><?= $coinTransaction['purchase_date'] ?></td>
                                <td><?= $coinTransaction['price'] / 1000 ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </section>

            <section>
                <h2>Pembelian Kursus</h2>
                <table id="course-purchase-table">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Pembelian</th>
                            <th>Pengajar</th>
                            <th>Koin</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (count($courseTransactions) > 0) : ?>
                        <?php foreach ($courseTransactions as $courseTransaction) : ?>
                        <tr>
                            <td><?= $courseTransaction['student_name'] ?></td>
                            <td><?= $courseTransaction['course_name'] ?><br><span class="purchase-time"><?= $courseTransaction['purchase_date'] ?></span></td>
                            <td><?= $courseTransaction['instructor_name'] ?></td>
                            <td>-5 Koin</td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
    let studentTable = new DataTable('#student-table');
    let koinPurchaseTable = new DataTable('#koin-purchase-table');
    let coursePurchaseTable = new DataTable('#course-purchase-table');
    </script>
</body>

</html>