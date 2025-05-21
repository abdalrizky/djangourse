<?php

session_start();

if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] !== 3) {
    header('Location: ../../auth.php');
    exit;
}

include '../../../utils/database/helper.php';
include '../../../utils/date.php';
include '../../../utils/number.php';

$students = fetch(
    "SELECT students.name, credentials.email FROM students
    JOIN credentials ON students.credential_id = credentials.id"
);
$studentsRecentlyRegister = fetch(
    "SELECT students.name, credentials.email FROM students
    JOIN credentials ON students.credential_id = credentials.id
    WHERE credentials.created_at = CURDATE()"
);
$instructors = fetch("SELECT * FROM instructors");
$courses = fetch("SELECT * FROM courses");
$coursesPending = fetch(
    "SELECT courses.name, course_categories.name as category, courses.level, instructors.name as instructor_name FROM courses
    JOIN course_categories ON courses.category_id = course_categories.id
    JOIN instructors ON courses.instructor_id = instructors.id
    WHERE courses.status = 'Menunggu'"
);
$coursesApproved = fetch(
    "SELECT courses.name, course_categories.name as category, courses.level, instructors.name as instructor_name FROM courses
    JOIN course_categories ON courses.category_id = course_categories.id
    JOIN instructors ON courses.instructor_id = instructors.id
    WHERE courses.status = 'Disetujui'
    LIMIT 5"
);
$withdrawal_requests = fetch(
    "SELECT instructors.name AS instructor_name, withdrawal_requests.amount, withdrawal_requests.created_at, withdrawal_requests.status FROM withdrawal_requests
    JOIN instructors ON withdrawal_requests.instructor_id = instructors.id"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor - Admin Djangourse</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <img src="../../../assets/img/logo-django.png" alt="" width="120px">
            <nav>
                <ul>
                    <li><a href="dashboard.php" class="sidebar-on">
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
                <h1>Dasbor</h1>
            </header>

            <section class="profile-widget">
                <h2>Selamat datang, Admin!</h2>
                <p>Hari yang cerah, selamat bekerja.</p>
                <a href="#job-list">Halaman ini merangkum seluruh aktivitas dan kegiatan di Djangourse.</a>
            </section>

            <section class="dashboard-counter">
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Total Siswa</div>
                        <div class="text-wrapper"><?= count($students) ?></div>
                    </div>
                    <iconify-icon icon="ph:student" class="counter-box-icon"></iconify-icon>
                </div>
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Total Pengajar</div>
                        <div class="text-wrapper"><?= count($instructors) ?></div>
                    </div>
                    <iconify-icon icon="mdi:teacher" class="counter-box-icon"></iconify-icon>
                </div>
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Total Kursus</div>
                        <div class="text-wrapper"><?= count($courses) ?></div>
                    </div>
                    <iconify-icon icon="hugeicons:course" class="counter-box-icon"></iconify-icon>
                </div>
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Siswa Mendaftar Hari ini</div>
                        <div class="text-wrapper"><?= count($studentsRecentlyRegister) ?></div>
                    </div>
                    <iconify-icon icon="fluent-mdl2:group" class="counter-box-icon"></iconify-icon>
                </div>
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Kursus Menunggu Persetujuan</div>
                        <div class="text-wrapper"><?= count($coursesPending) ?></div>
                    </div>
                    <iconify-icon icon="streamline:one-finger-hold" class="counter-box-icon"></iconify-icon>
                </div>
                <div class="counter-box">
                    <div class="counter-box-left">
                        <div class="title">Permintaan Penarikan</div>
                        <div class="text-wrapper"><?= count($withdrawal_requests) ?></div>
                    </div>
                    <iconify-icon icon="iconoir:wallet" class="counter-box-icon"></iconify-icon>
                </div>
            </section>

            <section>
                <h2 class="main-title">Ringkasan Aktivitas Terbaru</h2>
                <h3 class="table-title">Kursus Disetujui Baru</h3>
                <div class="table-box">
                    <?php if (count($coursesApproved) !== 0): ?>
                        <table class="common-table">
                            <tr>
                                <td>Judul Kursus</td>
                                <td>Kategori</td>
                                <td>Tingkatan</td>
                                <td>Pemublikasi</td>
                            </tr>
                            <?php foreach ($coursesApproved as $courseApproved): ?>
                                <tr>
                                    <td><?= $courseApproved['name'] ?></td>
                                    <td><?= $courseApproved['category'] ?></td>
                                    <td><?= $courseApproved['level'] ?></td>
                                    <td><?= $courseApproved['instructor_name'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Belum ada kursus yang ditambahkan</p>
                    <?php endif; ?>
                </div>
                <h3 class="table-title">Siswa Baru</h3>
                <div class="table-box">
                    <?php if (count($students) !== 0): ?>
                        <table class="common-table">
                            <tr>
                                <td>Nama Siswa</td>
                                <td>Email</td>
                            </tr>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= $student['name'] ?></td>
                                    <td><?= $student['email'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                       <p>Belum ada siswa yang mendaftar</p>
                    <?php endif; ?>
                </div>
                <h3 class="table-title">Permintaan Penarikan Dana</h3>
                <div class="table-box">
                    <?php if (count($withdrawal_requests) !== 0): ?>
                        <table class="common-table">
                            <tr>
                                <td>Diminta pada</td>
                                <td>Nama Pengajar</td>
                                <td>Jumlah</td>
                                <td>Status</td>
                            </tr>
                            <?php foreach ($withdrawal_requests as $withdrawal_request): ?>
                                <tr>
                                    <td><?= convertToWita($withdrawal_request['created_at']) ?></td>
                                    <td><?= $withdrawal_request['instructor_name'] ?></td>
                                    <td><?= 'Rp'. formatAsCurrency($withdrawal_request['amount']) ?></td>
                                    <td><?= $withdrawal_request['status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Belum ada permintaan penarikan dana</p>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>