<?php

session_start();

if (!isset($_SESSION['login']) || $_SESSION['user']['role_id'] != 2) {
    header('Location: ../auth.php');
    exit;
}

include '../../utils/database/helper.php';

if (!isset($_GET['id'])) {
    echo 'ID kursus tidak ditemukan';
    die;
}

$instructorId = $_SESSION['user']['id'];
$courseId = $_GET['id'];
$categories = fetch("SELECT * FROM course_categories");
$courseTools = fetch("SELECT * FROM course_tools");
$courseToolGalleries = fetch("SELECT * FROM course_tool_galleries WHERE course_id = $courseId");
if (!empty($courseToolGalleries)) {
    $courseToolGalleries = $courseToolGalleries[0];
}
$courseMaterials = fetch("SELECT * FROM course_materials WHERE course_id = $courseId");
$courses = fetch(
    "SELECT courses.id, courses.name, courses.subtitle, courses.price, courses.level, courses.description, courses.thumbnail, course_categories.name as category_name, course_categories.id as category_id  FROM courses
    JOIN course_categories ON courses.category_id = course_categories.id
    WHERE courses.id = $courseId"
)[0];
// var_dump($courses);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/multi-select-tag.css">
    <title>Edit Kursus</title>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <style>
    /* CSS perbaikan */
    body {
        font-family: 'Poppins', sans-serif;
        padding: 0;
        background-color: #f8f9fa;
        margin-top: 100px;
    }

    .container {
        padding: 20px;
        border-radius: 8px;
        margin: 80px auto;
        background-color: white;
        max-width: 800px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .logo-container {
        /* display: flex;
        justify-content: center;
        margin-bottom: 20px; */
        text-align: center;
    }

    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        align-items: center;
        padding: 8px;
        background-color: #245044;
    }

    .navbar a {
        text-decoration: none;
        color: #fff;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-left: 16px;
    }

    .navbar a iconify-icon {
        font-size: 20px;
    }

    .navbar a:hover {
        color: #A1D1B6;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .progress-bar {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .step {
        flex: 1;
        text-align: center;
        padding: 10px;
        color: #ccc;
        border-bottom: 2px solid #ccc;
        transition: all 0.3s;
    }

    .step.active {
        color: #4caf50;
        border-color: #4caf50;
        font-weight: bold;
    }

    .content-section {
        display: none;
    }

    .content-section.active {
        display: block;
    }

    .form-navigation {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #4caf50;
        color: white;
    }

    .btn-secondary {
        background-color: #ccc;
        color: black;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .upload-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .file-display {
        flex: 1;
        padding: 10px;
        background-color: #e0e0e0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    #preview {
        margin-top: 20px;
        height: 200px;
        background-color: #e0e0e0;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px dashed #ccc;
        border-radius: 5px;
    }

    #preview img {
        max-width: 100%;
        max-height: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <a href="dashboard.php">
                <iconify-icon icon="ion:arrow-back"></iconify-icon>
                <p>Kembali ke Dasbor</p>
            </a>
        </div>
        <div class="logo-container">
        <img src="../../assets/img/logo-django.png" alt="">
        </div>
        <h1>Edit Kursus Baru</h1>
        <form action="edit-course-action.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $courses['id'] ?>">
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="step active" data-step="informasi-dasar">Informasi Dasar</div>
                <div class="step" data-step="sampul-kursus">Sampul Kursus</div>
                <div class="step" data-step="pengaturan">Lainnya</div>
            </div>

            <!-- Informasi Dasar -->
            <div class="content-section active" id="informasi-dasar">
                <label for="judul-kursus">Judul Kursus</label>
                <input type="text" name="judul_kursus" id="judul-kursus" placeholder="Kursus Jago Koding dalam Satu Malam" value="<?= $courses['name'] ?>" required>
                <label for="subtitle-kursus">Subtitle Kursus</label>
                <input type="text" name="subtitle_kursus" id="subtitle-kursus" placeholder="Subtitle akan muncul di bawah judul" value="<?= $courses['subtitle'] ?>" required>
                <label for="kategori_kelas">Kategori Kelas</label>
                <select name="kategori_kelas" id="kategori_kelas">
                    <option disabled>Pilih Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= ($courses['category_id'] == $category['id']) ? 'selected': '' ?>><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="tingkat_kursus">Tingkat Kursus</label>
                <select name="tingkat_kursus" id="tingkat_kursus" required>
                    <option value="beginner" <?= ($courses['level'] == 'beginner') ? 'selected': '' ?>>Mudah</option>
                    <option value="intermediate" <?= ($courses['level'] == 'intermediate') ? 'selected': '' ?>>Menengah</option>
                    <option value="advanced" <?= ($courses['level'] == 'advanced') ? 'selected': '' ?>>Sulit</option>
                </select>

                <label for="alat_kursus">Alat</label>
                <select name="alat_kursus[]" id="alat_kursus" multiple>
                    <?php foreach ($courseTools as $tool): ?>
                        <option value="<?= $tool['id'] ?>"
                            <?= (!empty($courseToolGalleries)) ? (
                                ($courseToolGalleries['tool_id'] == $tool['id']) ? 'selected': '') : '' ?>
                            >
                            <?= $tool['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="deskripsi_kursus">Deskripsi Kursus</label>
                <textarea name="deskripsi_kursus" style="height: 200px" id="deskripsi_kursus" placeholder="Kursus ini menjelaskan bagaimana cara membuat aplikasi web dengan PHP dan MySQL dalam satu malam seperti halnya membangun candi."
                    required><?= htmlspecialchars($courses['description']) ?></textarea>
            </div>

            <!-- Sampul Kursus -->
            <div class="content-section" id="sampul-kursus">
                <label for="file-upload">Sampul Kursus</label>
                <div class="upload-wrapper">
                    <input type="file" name="thumbnail" id="file-upload" accept="image/*">
                </div>
                <div id="preview">
                    <img src="<?= $courses['thumbnail'] ?>" alt="Preview Gambar">
                </div>
            </div>

            <!-- Pengaturan -->
            <div class="content-section" id="pengaturan">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" placeholder="Masukkan harga kursus" value="<?= $courses['price'] ?>" required>
                <label for="materi">Materi</label>
                <button onclick="addMaterial()"><iconify-icon icon="ic:round-add"></iconify-icon>Tambah Materi</button>
                <?php foreach ($courseMaterials as $material): ?>
                        <div>
                            <label for="materi">Materi <?= $material['ordinal'] ?></label>
                            <input type="text" name="materi[<?= $material['ordinal'] ?>][title]" placeholder="Judul materi" value="<?= $material['title'] ?>" required>
                            <input type="text" name="materi[<?= $material['ordinal'] ?>][video-link]" placeholder="Tautan video Youtube" value="<?= "https://www.youtube.com/watch?v=". $material['video_link'] ?>" required>
                            <input type="hidden" name="materi[<?= $material['ordinal'] ?>][ordinal]" value="<?= $material['ordinal'] ?>" placeholder="order" required>
                        </div>
                <?php endforeach; ?>
            </div>

            <!-- Navigasi Form -->
            <div class="form-navigation">
                <button type="button" class="btn btn-secondary" id="btn-kembali" style="display: none;">Kembali</button>
                <button type="button" class="btn btn-primary" id="btn-selanjutnya">Selanjutnya</button>
                <button type="submit" class="btn btn-primary" id="btn-simpan" style="display: none;">Simpan</button>
            </div>
        </form>
    </div>

    <script>
    const steps = document.querySelectorAll('.step');
    const sections = document.querySelectorAll('.content-section');
    const btnKembali = document.getElementById('btn-kembali');
    const btnSelanjutnya = document.getElementById('btn-selanjutnya');
    const btnSimpan = document.getElementById('btn-simpan');
    const fileUpload = document.getElementById('file-upload');
    const preview = document.getElementById('preview');

    let currentStep = 0;

    // Navigasi
    function updateStep(direction) {
        currentStep += direction;
        currentStep = Math.max(0, Math.min(currentStep, steps.length - 1));

        steps.forEach((step, index) => {
            step.classList.toggle('active', index === currentStep);
            sections[index].classList.toggle('active', index === currentStep);
        });

        btnKembali.style.display = currentStep === 0 ? 'none' : 'inline-block';
        btnSelanjutnya.style.display = currentStep === steps.length - 1 ? 'none' : 'inline-block';
        btnSimpan.style.display = currentStep === steps.length - 1 ? 'inline-block' : 'none';
    }

    btnKembali.addEventListener('click', () => updateStep(-1));
    btnSelanjutnya.addEventListener('click', () => updateStep(1));

    // Preview Gambar
    fileUpload.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview Gambar">`;
            };
            reader.readAsDataURL(file);
        }
    });

    let materialCount = <?= count($courseMaterials) ?>;
    function addMaterial() {
        const material = document.createElement('div');
        material.innerHTML = `
            <label for="materi">Materi ${materialCount+1}</label>
            <input type="text" name="materi[${materialCount}][title]" placeholder="Judul materi" required>
            <input type="text" name="materi[${materialCount}][video-link]" placeholder="Tautan video Youtube" required>
            <input type="hidden" name="materi[${materialCount}][ordinal]" value="${materialCount+1}" placeholder="order" required>
        `;
        document.getElementById('pengaturan').appendChild(material);
        materialCount++;
    }
    </script>
    <script src="scripts/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('alat_kursus', {
            placeholder: 'Cari...',
        })
    </script>
</body>

</html>