<?php

require 'utils/database/helper.php';

session_start();

if (isset($_SESSION["login"])) {
    $userId = $_SESSION['user']['id'];

    if ($_SESSION['user']['role_id'] == 1) {
        $student = fetch("SELECT coin_balance FROM students WHERE id=$userId")[0];
    }

    if ($_SESSION['user']['role_id'] == 3) {
        header('Location: pages/admin/views/dashboard.php');
        die;
    }
}

// query top course berdasarkan jumlah transaksi course tsb...
$query = "  SELECT 
                c.id as course_id,
                c.name AS course_name,
                c.price AS course_price,
                c.thumbnail AS course_thumbnail,
                COUNT(t.id) AS enrolled_students
            FROM 
                courses c
            LEFT JOIN 
                transactions t ON c.id = t.course_id
            WHERE 
                t.transaction_type = 'purchase'
            GROUP BY 
                c.id, c.name, c.price, c.description, c.thumbnail
            ORDER BY 
                enrolled_students DESC
            LIMIT 3;";

$courses = fetch($query);

$success_message = null;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Djangourse - Kursus Programmer</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Just+Another+Hand&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar">
            <img src="assets/img/logo-django.png" alt="Logo" class="logo" style="  width: 110px; ">
            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pages/course-list.php">Kursus</a></li>
                    <li><a href="pages/how-to-use.php">Cara Penggunaan</a></li>
                </ul>
            </nav>
            <?php if (isset($_SESSION['login'])): ?>
            <div class="navbar-info">
                <p>Hai, <?= $_SESSION['user']['name'] ?></p>
                <iconify-icon icon="iconamoon:arrow-down-2-bold" id="btn-dropdown"></iconify-icon>
                <?php if ($_SESSION['user']['role_id'] == 1): ?>
                <a href="pages/student/coin-dashboard.php" class="coin-balance"><?= $student['coin_balance'] ?> Koin</a>
                <div class="navbar-info-dropdown hide" id="navbar-info-dropdown">
                    <a href="pages/student/profile.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="iconoir:profile-circle"></iconify-icon>
                            <span>Profil</span>
                        </div>
                    </a>
                    <a href="pages/student/favourite-course.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="weui:like-filled"></iconify-icon>
                            <span>Wishlist</span>
                        </div>

                    </a>
                    <a href="pages/student/setting.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="uil:setting"></iconify-icon>
                            <span>Pengaturan</span>
                        </div>
                    </a>
                    <a href="pages/logout.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="material-symbols:logout" class="sidebar-icon"></iconify-icon>
                            <span>Keluar</span>
                        </div>
                    </a>
                </div>
                <?php elseif ($_SESSION['user']['role_id'] == 2): ?>
                <div class="navbar-info-dropdown hide" id="navbar-info-dropdown">
                    <a href="pages/instructor/dashboard.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="iconoir:profile-circle"></iconify-icon>
                            <span>Dasbor</span>
                        </div>
                    </a>
                    <a href="pages/logout.php">
                        <div class="navbar-info-dropdown-content">
                            <iconify-icon icon="material-symbols:logout" class="sidebar-icon"></iconify-icon>
                            <span>Keluar</span>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <?php else: ?>
            <div class="auth-buttons">
                <button class="style-daftar" onclick="location.href='pages/auth.php'">Daftar</button>
                <button class="style-masuk" onclick="location.href='pages/auth.php'">Masuk</button>
            </div>
            <?php endif; ?>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Selangkah menjadi <span><br> Programmer</span></h1>
            <p>Djangourse adalah salah satu penyedia layanan kursus bagi programmer pemula.</p>
            <div class="buttons">
                <button class="filled" onclick="location.href='pages/course-list.php'">Cari Kursus</button>
                <button class="outlined">Jelajahi</button>
            </div>
            <div class="trusted-by">
                <p>Telah dipercaya oleh:</p>
            </div>
            <div class="trusted-logos">
                <img src="assets/img/gl.png" alt="Google">
                <img src="assets/img/yt.png" alt="YouTube">
                <img src="assets/img/fb.png" alt="Facebook">
            </div>
        </div>
        <img src="assets/img/orang.png" alt="Programming Image" class="hero-image">
    </section>

    <section class="statistics">
        <div class="stat">
            <span class="number">2 ribu</span>
            <span class="label">Pengajar</span>
        </div>
        <div class="separator">|</div>
        <div class="stat">
            <span class="number">500+</span>
            <span class="label">Jam Belajar</span>
        </div>
        <div class="separator">|</div>
        <div class="stat">
            <span class="number">250+</span>
            <span class="label">Materi</span>
        </div>
        <div class="separator">|</div>
        <div class="stat">
            <span class="number">700 ribu</span>
            <span class="label">Siswa Aktif</span>
        </div>
    </section>

    <section class="popular-courses">
        <h2>Kursus Terpopuler</h2>
        <p>Pelajari kursus dengan tingkat peminat tinggi belakangan ini</p>
        <div class="courses">
            <?php foreach ($courses as $course): ?>
            <div class="catalog">
                <div class="catalog-header">
                    <a href="pages/course-detail.php?id=<?= $course['course_id'] ?>" class="catalog-link">
                        <div class="catalog-title"><?= $course['course_name'] ?></div>
                    </a>
                    <button class="flame" name="flame">
                        <i class="fas fa-fire"></i>
                    </button>
                </div>
                <img class="course-image"
                    src="<?= $course['course_thumbnail'] ? "pages/instructor/" . $course['course_thumbnail'] : "https://placehold.co/600x400?text=Tidak+Ada+Gambar" ?>"
                    alt="Thumbnail Kursus">
                <div class="catalog-footer">
                    <div class="koin"><?= number_format($course['course_price'] / 1000, 0, ',', '.') ?> Koin</div>
                    <a href="pages/course-detail.php?id=<?= $course['course_id'] ?>"><button type="submit"
                            class="button-rental">Beli</button></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="logo-section">
                <img src="assets/img/logo-django.png" alt="Logo" class="footer-logo">
                <p>Bergabunglah bersama kami untuk menguasai<br> berbagai keahlian
                    dibidang teknologi dan membuka<br>peluang karier di dunia teknologi
                    yang terus berkembang.<br><br> Kami menyediakan kursus
                    berkualitas yang membantu <br> kamu berkembang dari pemula
                    hingga ahli.</p>
                <div class="hak-cipta">
                    <p>© 2024 Django Course. Semua hak cipta dilindungi.</p>
                </div>
            </div>
            <div class="links-section">
                <h3>Instruktur</h3>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Instructor</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
            <div class="links-section">
                <h3>Siswa</h3>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Jelajahi Kursus</a></li>
                    <li><a href="#">Wishlist Kursus</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
            <div class="contact-section">
                <h3>Alamat</h3>
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="https://www.google.com/maps?q=Jalan+Gubeng+Surabaya" target="_blank">Jalan Gubeng,
                        Surabaya</a>
                </p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:info@djangourse.com">info@dingcourse.com</a>
                </p>
                <p>
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:+62123456789">+62 123 456 789</a>
                </p>
            </div>

        </div>
    </footer>
</body>
<script src="index.js"></script>
<script>
function toggleHeart(element) {
    element.classList.toggle('text-red-500');
    element.classList.toggle('far');
    element.classList.toggle('fas');
}
</script>

</html>