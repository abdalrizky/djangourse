<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Daftar Kursus - Djangourse</title>
    <style>
    /* Global Box Sizing */
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* Body Styling */
    body {
        font-family: "poppins", sans-serif;
        line-height: 1.6;
        background: linear-gradient(to left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
            linear-gradient(180deg, rgba(217, 217, 217, 0.65) 0%, rgba(44, 133, 119, 0.65) 67.5%);
        color: #333;
        margin: 0;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 4rem;
        background-color: #245044;
    }

    .navbar ul {
        display: flex;
        list-style: none;
        gap: 30px;
    }

    .navbar ul li {
        margin-left: 20px;
    }

    .navbar a {
        text-decoration: none;
        color: #fff;
        transition: color 0.3s ease, border-bottom 0.3s ease;
    }

    .navbar a:hover {
        color: #A1D1B6;
        border-bottom: 2px solid #A1D1B6;
    }

    .auth-buttons button {
        margin-left: 10px;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        background-color: #245044;
        color: #fff;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .auth-buttons button:hover {
        background-color: #15A3A1;
        transform: scale(1.05);
    }

    .main-content {
        padding: 40px 20px;
        text-align: center;
        padding-bottom: 0;
        /* background: linear-gradient(to left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
                  linear-gradient(180deg, rgba(217, 217, 217, 0.65) 0%, rgba(44, 133, 119, 0.65) 67.5%); */
    }

    .main-content h1 {
        color: #000000;
        font-size: 36px;
        margin-bottom: 10px;
    }

    .main-content p {
        font-size: 18px;
        color: rgba(0, 0, 0, 0.95);
        margin-bottom: 30px;
    }

    .search-bar {
        margin-bottom: 30px;
    }

    .search-bar input {
        width: 50%;
        padding: 10px;
        border-radius: 25px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .tabs {
        display: flex;
        gap: 100px;
        margin-top: 20px;
        justify-content: center;
    }

    .tabs a {
        text-decoration: none;
        color: #245044;
        font-family: "Poppins", sans-serif;
        font-size: 18px;
        line-height: 150%;
        transition: all 0.3s ease;
        position: relative;
    }

    .tabs a::after {
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        background-color: #245044;
        left: 0;
        bottom: -3px;
        transition: width 0.3s ease;
    }

    .tabs a:hover::after,
    .tabs a.active::after {
        width: 100%;
    }

    .tabs a:hover {
        color: #245044;
        font-weight: bold;
        font-size: 18px;
        transform: scale(1.05);
    }

    .pilihan {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        justify-content: center;
        margin: 0 auto;
        max-width: 1000px;
        padding-top: 50px;
        padding-bottom: 40px;
    }

    .catalog {
        background: #ffffff;
        border-radius: 10px;
        width: 260px;
        height: 340px;
        flex-direction: column;
        padding: 20px;
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .catalog-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .catalog-title {
        color: #1a202c;
        font-family: "Poppins-Bold", sans-serif;
        font-size: 20px;
        font-weight: 700;
    }

    .heart {
        font-size: 24px;
        color: rgba(0, 0, 0, 0.3);
        background: transparent;
        border: none;
        cursor: pointer;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .heart.active {
        color: #ff4d6d;

    }

    .heart:hover {
        transform: scale(1.3);
    }

    .course-image {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        margin: 20px 0;
    }

    .catalog-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .koin {
        color: #1a202c;
        font-family: "Poppins-Bold", sans-serif;
        font-size: 20px;
        font-weight: 700;
    }

    .button-rental {
        background: var(--coloractive-button, #1e888c);
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-rental:hover {
        background-color: #128e8c;
    }

    #loadMore {
        margin: 20px auto;
        margin-bottom: 40px;
        margin-top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px 12px 20px;
        font-size: 18px;
        font-weight: bold;
        background: #245044;
        color: #ffffff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #loadMore:hover {
        background-color: #1e888c;
    }

    #loadLess {
        margin: 20px auto;
        margin-bottom: 40px;
        margin-top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px 12px 20px;
        font-size: 18px;
        font-weight: bold;
        background: #245044;
        color: #ffffff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #loadLess:hover {
        background-color: #1e888c;
    }

    .controls {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin: 0 auto;
        width: 100%;
    }

    .catalog.hidden {
        display: none !important;
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            align-items: flex-start;
            padding: 16px 32px;
        }

        .menu {
            flex-direction: column;
            gap: 16px;
            margin-top: 16px;
        }

        .auth-buttons {
            margin-top: 16px;
            width: 100%;
            justify-content: flex-start;
            gap: 12px;
        }

        .style-daftar,
        .style-masuk {
            width: 100%;
            text-align: center;
        }

        .main-content h1 {
            font-size: 28px;
        }

        .search-bar input {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="navbar">
             <img src="../../assets/img/logo-django.png" alt="Logo" class="logo" style="  width: 110px; ">
            <nav>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Kursus</a></li>
                    <li><a href="#">Cara Penggunaan</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <button class="login">Masuk</button>
                <button class="signup">Daftar</button>
            </div>
        </div>
    </header>

    <!-- pilihan -->
    <main class="main-content">
        <h1>Daftar Kursus</h1>
        <p>Pelajari semua kursus yang tersedia di Djangourse</p>
        <div class="search-bar">
            <input placeholder="Cari..." type="text" id="searchInput" />
        </div>
        <div class="tabs">
            <a class="web-development" href="#">Web Development</a>
            <a class="mobile-development" href="#">Mobile Development</a>
            <a class="soft-skills" href="#">Soft Skills</a>
            <a class="i-os-development" href="#">iOS Development</a>
        </div>

        <div class="pilihan">
            <!-- Catalog 1 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">HTML</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/komputer.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 2 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">CSS</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/komputer.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 3 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">Javascript</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 4 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 5 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 6 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 7 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 8 -->
            <div class="catalog">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>

            <!-- Catalog 4 (Tersembunyi Awalnya) -->
            <div class="catalog hidden">
                <div class="catalog-header">
                    <div class="catalog-title">PHP</div>
                    <button class="heart" onclick="toggleFavorite(this)">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
                <img class="course-image" src="assets/layarhitam-jpg0.png" alt="Course Image">
                <div class="catalog-footer">
                    <div class="koin">5 Koin</div>
                    <button class="button-rental">Beli</button>
                </div>
            </div>
    </main>

    <!-- Tombol untuk Tampilkan Lebih Banyak -->
    <div class="controls">
        <button id="loadMore">Tampilkan Lebih Banyak</button>
        <button id="loadLess" style="display: none;">Tampilkan Lebih Sedikit</button>
    </div>


    <script>
    function toggleFavorite(button) {
        button.classList.toggle('active');
    }

    // Fungsi untuk menampilkan lebih banyak katalog
    document.getElementById('loadMore').addEventListener('click', function() {
        const hiddenCatalogs = document.querySelectorAll('.catalog.hidden');
        hiddenCatalogs.forEach((catalog) => {
            catalog.classList.remove('hidden');
        });
        document.getElementById('loadLess').style.display =
            'inline-block';
        this.style.display = 'none';
    });

    // Fungsi untuk menampilkan lebih sedikit katalog
    document.getElementById('loadLess').addEventListener('click', function() {
        const catalogs = document.querySelectorAll('.catalog');
        const maxVisible = 8;

        catalogs.forEach((catalog, index) => {
            if (index >= maxVisible) {
                catalog.classList.add('hidden');
            }
        });

        document.getElementById('loadMore').style.display =
            'inline-block';
        this.style.display = 'none';
    });

    // Fungsi pencarian katalog
    document.getElementById("searchInput").addEventListener("input", function() {
        const searchQuery = this.value.toLowerCase();
        const catalogs = document.querySelectorAll(".catalog");

        catalogs.forEach(catalog => {
            const title = catalog.querySelector(".catalog-title").textContent.toLowerCase();
            if (title.includes(searchQuery)) {
                catalog.style.display = "block";
            } else {
                catalog.style.display = "none";
            }
        });
    });
    </script>
    <style>
    .hidden {
        display: none;
    }
    </style>
  <?php include '../../components/footer.php'; ?>
</body>

</html>
