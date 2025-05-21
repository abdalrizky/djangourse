<?php

session_start();
if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] !== 3) {
    header('Location: ../../auth.php');
    exit;
}

require '../../../utils/database/helper.php';

$course_by_categories = fetch(
    "SELECT cc.name AS category_name, COUNT(c.id) AS total_courses
    FROM course_categories cc
    LEFT JOIN courses c ON c.category_id = cc.id
    GROUP BY cc.id"
);

$student_registered = fetch(
    "SELECT s.name AS student_name, COUNT(ec.course_id) AS enrolled_courses
    FROM students s
    JOIN enrolled_courses ec ON ec.student_id = s.id
    GROUP BY s.id
    LIMIT 5"
);

$income_transactions = fetch(
    "SELECT DATE_FORMAT(purchase_date, '%Y-%m') AS month, SUM(price) AS revenue
    FROM transactions
    WHERE transaction_type = 'purchase'
    GROUP BY month
    ORDER BY month"
);

$popular_courses = fetch(
    "SELECT c.name AS course_name, COUNT(ec.id) AS enrolled
    FROM courses c
    JOIN enrolled_courses ec ON ec.course_id = c.id
    GROUP BY c.id
    ORDER BY enrolled DESC
    LIMIT 5;"
);

$labels_course_by_categories = [];
$totals_course_by_categories = [];
$labels_student_registered = [];
$totals_student_registered = [];
$labels_income_transactions = [];
$totals_income_transactions = [];
$labels_popular_courses = [];
$totals_popular_courses = [];

foreach ($course_by_categories as $row) {
    $labels[] = $row['category_name'];
    $totals[] = (int)$row['total_courses'];
}

foreach ($student_registered as $row) {
    $labels_student_registered[] = $row['student_name'];
    $totals_student_registered[] = (int)$row['enrolled_courses'];
}

foreach ($income_transactions as $row) {
    $labels_income_transactions[] = $row['month'];
    $totals_income_transactions[] = (int)$row['revenue'];
}

foreach ($popular_courses as $row) {
    $labels_popular_courses[] = $row['course_name'];
    $totals_popular_courses[] = (int)$row['enrolled'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Djangourse</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/report.css">
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
                    <li><a href="report.php" class="sidebar-on">
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
                <h1>Laporan</h1>
            </header>

            <section class="charts">
                <div class="chart-container">
                    <h3>Siswa Mendaftar Kursus</h3>
                    <canvas id="topStudents"></canvas>
                </div>

                <div class="chart-container">
                    <h3>Kelas Terpopuler</h3>
                    <canvas id="popularCourses"></canvas>
                </div>
                
                <div class="chart-container">
                    <h3>Jumlah Kursus per Kategori</h3>
                    <canvas id="coursesPerCategory"></canvas>
                </div>
                
                <div class="chart-container">
                    <h3>Transaksi Beli Per Bulan</h3>
                    <canvas id="monthlyRevenue"></canvas>
                </div>

            </section>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx1 = document.getElementById('coursesPerCategory').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels_course_by_categories) ?>,
            datasets: [{
                label: 'Jumlah Kursus',
                data: <?= json_encode($totals_course_by_categories) ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.7)'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    const ctx2 = document.getElementById('topStudents').getContext('2d');
new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: <?= json_encode($labels_student_registered) ?>,
        datasets: [{
            data: <?= json_encode($totals_student_registered) ?>,
            backgroundColor: ['#36a2eb', '#ff6384', '#ffcd56', '#4bc0c0', '#9966ff']
        }]
    },
    options: {
        responsive: true
    }
});

const ctx3 = document.getElementById('monthlyRevenue').getContext('2d');
new Chart(ctx3, {
    type: 'line',
    data: {
        labels: <?= json_encode($labels_income_transactions) ?>,
        datasets: [{
            label: 'Pendapatan Bulanan',
            data: <?= json_encode($totals_income_transactions) ?>,
            borderColor: 'rgba(255, 99, 132, 1)',
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true } }
    }
});

const ctx4 = document.getElementById('popularCourses').getContext('2d');
new Chart(ctx4, {
    type: 'doughnut',
    data: {
        labels: <?= json_encode($labels_popular_courses) ?>,
        datasets: [{
            data: <?= json_encode($totals_popular_courses) ?>,
            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8']
        }]
    },
    options: {
        responsive: true
    }
});
    </script>
</body>
</html>