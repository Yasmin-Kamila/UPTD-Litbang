<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - UPTD Litbang Keramik Plered Purwakarta</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/backend/beranda.css') }}">
</head>

<body>

<div class="dashboard">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar" id="sidebar">

        <!-- LOGO -->
        <div class="brand">

            <div class="brand-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Logo UPTD">
            </div>

            <div class="brand-text">
                <strong>UPTD LITBANG</strong>
                <strong>KERAMIK</strong>
                <span>PLERED PURWAKARTA</span>
            </div>

        </div>


        <!-- GARIS -->
        <div class="sidebar-line"></div>


        <!-- MENU UTAMA -->
        <div class="menu-title">
            MENU UTAMA
        </div>


        <!-- MENU -->
        <nav class="menu">

            <!-- DASHBOARD -->
            <a href="{{ route('backend.beranda') }}"
               class="menu-item active">

                <i class="fa-solid fa-house"></i>

                <span>Dashboard</span>

            </a>


            <!-- PROFIL -->
            <a href="{{ route('backend.profil') }}"
               class="menu-item">

                <i class="fa-solid fa-user"></i>

                <span>Profil</span>

            </a>


            <!-- GALERI -->
            <a href="{{ route('backend.galeri') }}"
               class="menu-item">

                <i class="fa-solid fa-image"></i>

                <span>Galeri</span>

            </a>


            <!-- ARTIKEL -->
            <a href="{{ route('backend.artikel') }}"
               class="menu-item">

                <i class="fa-solid fa-newspaper"></i>

                <span>Artikel</span>

            </a>


            <!-- LAYANAN -->
            <a href="{{ route('backend.layanan') }}"
               class="menu-item">

                <i class="fa-solid fa-layer-group"></i>

                <span>Layanan</span>

            </a>


            <!-- ORGANIGRAM -->
            <a href="{{ route('backend.organigram') }}"
               class="menu-item">

                <i class="fa-solid fa-sitemap"></i>

                <span>Organigram</span>

            </a>

        </nav>


        <!-- ================= KELUAR ================= -->

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Keluar</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- ================= TOPBAR ================= -->

        <header class="topbar">

            <div class="topbar-left">

                <button
                    class="toggle-btn"
                    id="toggleBtn"
                    type="button">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <h1>Dashboard</h1>

            </div>


            <!-- ADMIN -->

            <div class="admin">

                <div class="admin-icon">

                    <i class="fa-regular fa-user"></i>

                </div>


                <div class="admin-text">

                    <strong>
                        {{ session('nama', 'Admin') }}
                    </strong>

                    <span>
                        {{ session('role', 'Administrator') }}
                    </span>

                </div>

            </div>

        </header>


        <!-- ================= CONTENT ================= -->

        <section class="content">


            <!-- ================= WELCOME ================= -->

            <div class="welcome">

                <h2>
                    Selamat Datang, {{ session('nama', 'Admin') }}!
                </h2>

                <p>
                    Kelola informasi website UPTD Litbang Keramik
                    Plered Purwakarta dengan mudah.
                </p>

            </div>


            <!-- ================= STAT CARD ================= -->

            <div class="stats">


                <!-- ARTIKEL -->

                <div class="stat-card">

                    <div class="stat-icon artikel">

                        <i class="fa-regular fa-clipboard"></i>

                    </div>


                    <div class="stat-info">

                        <span>
                            Artikel
                        </span>

                        <strong>
                            {{ $jumlahArtikel }}
                        </strong>

                        <small>
                            Total Artikel
                        </small>

                    </div>

                </div>


                <!-- GALERI -->

                <div class="stat-card">

                    <div class="stat-icon galeri">

                        <i class="fa-regular fa-image"></i>

                    </div>


                    <div class="stat-info">

                        <span>
                            Galeri
                        </span>

                        <strong>
                            {{ $jumlahGaleri }}
                        </strong>

                        <small>
                            Total Foto
                        </small>

                    </div>

                </div>


                <!-- LAYANAN -->

                <div class="stat-card">

                    <div class="stat-icon layanan">

                        <i class="fa-regular fa-newspaper"></i>

                    </div>


                    <div class="stat-info">

                        <span>
                            Layanan
                        </span>

                        <strong>
                            {{ $jumlahLayanan }}
                        </strong>

                        <small>
                            Total Layanan
                        </small>

                    </div>

                </div>


                <!-- USER -->

                <div class="stat-card">

                    <div class="stat-icon user">

                        <i class="fa-solid fa-users"></i>

                    </div>


                    <div class="stat-info">

                        <span>
                            User
                        </span>

                        <strong>
                            {{ $jumlahUser }}
                        </strong>

                        <small>
                            Total User
                        </small>

                    </div>

                </div>

            </div>


            <!-- ================= BOTTOM ================= -->

            <div class="bottom-section">


                <!-- ================= AKTIVITAS ================= -->

                <div class="activity">

                    <h2>
                        Aktivitas Terbaru
                    </h2>


                    <div class="activity-list">


                        <div class="activity-item">

                            <span>
                                {{ session('nama', 'Admin') }}
                                menambahkan artikel baru
                            </span>

                        </div>


                        <div class="activity-item">

                            <span>
                                {{ session('nama', 'Admin') }}
                                menambahkan gambar galeri
                            </span>

                        </div>


                        <div class="activity-item">

                            <span>
                                {{ session('nama', 'Admin') }}
                                memperbarui informasi layanan
                            </span>

                        </div>


                        <div class="activity-item">

                            <span>
                                {{ session('nama', 'Admin') }}
                                memperbarui profil UPTD
                            </span>

                        </div>


                        <div class="activity-item">

                            <span>
                                {{ session('nama', 'Admin') }}
                                melakukan perubahan data
                            </span>

                        </div>


                    </div>

                </div>


                <!-- ================= AKSI CEPAT ================= -->

                <div class="quick-action">

                    <h2>
                        Aksi Cepat
                    </h2>


                    <!-- TAMBAH ARTIKEL -->

                    <a href="{{ route('backend.artikel') }}"
                       class="quick-item">

                        <i class="fa-solid fa-file-circle-plus"></i>

                        <span>
                            Tambah Artikel
                        </span>

                    </a>


                    <!-- TAMBAH GAMBAR -->

                    <a href="{{ route('backend.galeri') }}"
                       class="quick-item">

                        <i class="fa-solid fa-image"></i>

                        <span>
                            Tambah Gambar
                        </span>

                    </a>


                    <!-- TAMBAH LAYANAN -->

                    <a href="{{ route('backend.layanan') }}"
                       class="quick-item">

                        <i class="fa-solid fa-square-plus"></i>

                        <span>
                            Tambah Layanan
                        </span>

                    </a>


                </div>

            </div>

        </section>

    </main>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

    const toggleBtn = document.getElementById('toggleBtn');

    const sidebar = document.getElementById('sidebar');


    toggleBtn.addEventListener('click', function () {

        if (window.innerWidth <= 700) {

            sidebar.classList.toggle('mobile-open');

            toggleBtn.classList.toggle('mobile-toggle-open');

        } else {

            sidebar.classList.toggle('hide');

        }

    });

</script>


</body>
</html>