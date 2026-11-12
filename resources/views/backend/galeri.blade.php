<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - UPTD Litbang Keramik Plered Purwakarta</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/backend/galeri.css') }}">
</head>

<body>

<div class="dashboard">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Logo UPTD">
            </div>

            <div class="brand-text">
                <strong>UPTD LITBANG KERAMIK</strong>
                <span>Plered Purwakarta</span>
            </div>

        </div>

        <div class="sidebar-line"></div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="{{ route('backend.beranda') }}" class="menu-item">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('backend.profil') }}" class="menu-item">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>

            <a href="{{ route('backend.galeri') }}" class="menu-item active">
                <i class="fa-solid fa-image"></i>
                <span>Galeri</span>
            </a>

            <a href="{{ route('backend.artikel') }}" class="menu-item">
                <i class="fa-solid fa-newspaper"></i>
                <span>Artikel</span>
            </a>

            <a href="{{ route('backend.layanan') }}" class="menu-item">
                <i class="fa-solid fa-layer-group"></i>
                <span>Layanan</span>
            </a>

            <a href="{{ route('backend.organigram') }}" class="menu-item">
                <i class="fa-solid fa-sitemap"></i>
                <span>Organigram</span>
            </a>

        </nav>

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

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-left">

                <button
                    class="toggle-btn"
                    id="toggleBtn"
                    type="button">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <h1>Galeri</h1>

            </div>


            <div class="admin">

                <div class="admin-icon">
                    <i class="fa-regular fa-user"></i>
                </div>

                <div class="admin-text">
                    <strong>{{ session('nama', 'Admin') }}</strong>
                    <span>{{ session('role', 'Administrator') }}</span>
                </div>

            </div>

        </header>


        <!-- ================= CONTENT ================= -->

        <section class="content">

            <!-- SUCCESS -->

            @if (session('success'))

                <div class="alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- HEADING -->

            <div class="gallery-heading">

                <div>

                    <h2>Data Galeri</h2>

                    <p>
                        Kelola foto kegiatan, koleksi kerajinan dan dokumentasi lainnya
                    </p>

                </div>


                <!-- TOMBOL TAMBAH -->

                <button
                    class="add-btn"
                    type="button"
                    onclick="bukaTambahGambar()">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Galeri

                </button>

            </div>


            <!-- ================= FILTER ================= -->

            <div class="filter-area">

                <div class="search-box">

                    <label>Cari</label>

                    <div class="search-input">

                        <input
                            type="text"
                            id="searchGallery"
                            placeholder="Cari judul galeri">

                        <i class="fa-solid fa-magnifying-glass"></i>

                    </div>

                </div>


                <button
                    class="reset-btn"
                    type="button"
                    onclick="resetGallerySearch()">

                    <i class="fa-regular fa-circle-xmark"></i>

                    Reset Filter

                </button>

            </div>


            <!-- ================= GALLERY ================= -->

            <div class="gallery-grid" id="galleryGrid">

                @forelse ($galeri as $item)

                    <div class="gallery-card">

                        <!-- GAMBAR -->

                        <div class="gallery-image">

                            @if ($item->gambar)

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}">

                            @else

                                <div class="image-placeholder">
                                    <i class="fa-regular fa-image"></i>
                                </div>

                            @endif

                        </div>


                        <!-- INFORMASI -->

                        <div class="gallery-info">

                            <div class="gallery-text">

                                <h3>
                                    {{ $item->judul }}
                                </h3>

                                <p>

                                    <i class="fa-regular fa-calendar"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </p>

                            </div>


                            <!-- AKSI -->

                            <div class="card-actions">

                                <!-- EDIT -->

                                <button
                                    class="edit-icon"
                                    type="button"
                                    title="Edit"
                                    onclick="bukaEditGambar(
                                        {{ $item->id_galeri }},
                                        @js($item->judul),
                                        @js($item->tanggal)
                                    )">

                                    <i class="fa-solid fa-pen"></i>

                                </button>


                                <!-- DELETE -->

                                <form
                                    action="{{ route('backend.galeri.destroy', $item->id_galeri) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus gambar ini?');">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="delete-icon"
                                        type="submit"
                                        title="Hapus">

                                        <i class="fa-solid fa-trash-can"></i>

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="empty-gallery">

                        <i class="fa-regular fa-images"></i>

                        <p>
                            Belum ada data galeri.
                        </p>

                    </div>

                @endforelse

            </div>

        </section>

    </main>

</div>


<!-- ==================================================
     MODAL TAMBAH GAMBAR
================================================== -->

<div class="modal" id="modalTambahGambar">

    <div class="modal-box">

        <div class="modal-header">

            <h2>Tambah Gambar</h2>

            <button
                type="button"
                class="close-modal"
                onclick="tutupTambahGambar()">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        <!-- FORM TAMBAH -->

        <form
            action="{{ route('backend.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="form-body">

                <!-- GAMBAR -->

                <div class="form-group">

                    <label for="gambar">
                        Gambar
                    </label>

                    <div class="file-input-wrapper">

                        <input
                            type="file"
                            id="gambar"
                            name="gambar"
                            accept="image/*"
                            required>

                        <label
                            for="gambar"
                            class="file-button">

                            Pilih File

                        </label>

                        <span id="namaFile">
                            Tidak ada file yang dipilih
                        </span>

                    </div>

                </div>


                <!-- JUDUL -->

                <div class="form-group">

                    <label for="judul_gambar">
                        Judul Gambar
                    </label>

                    <input
                        type="text"
                        id="judul_gambar"
                        name="judul"
                        placeholder="Masukkan judul gambar"
                        required>

                </div>


                <!-- TANGGAL -->

                <div class="form-group">

                    <label for="tanggal">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        required>

                </div>

            </div>


            <!-- FOOTER -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="tutupTambahGambar()">

                    <i class="fa-solid fa-xmark"></i>

                    Batal

                </button>


                <button
                    type="submit"
                    class="save-btn">

                    <i class="fa-solid fa-check"></i>

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>


<!-- ==================================================
     MODAL EDIT GAMBAR
================================================== -->

<div class="modal" id="modalEditGambar">

    <div class="modal-box">

        <div class="modal-header">

            <h2>Edit Gambar</h2>

            <button
                type="button"
                class="close-modal"
                onclick="tutupEditGambar()">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        <!-- FORM EDIT -->

        <form
            id="formEditGambar"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="form-body">

                <!-- GAMBAR -->

                <div class="form-group">

                    <label for="edit_gambar">
                        Gambar
                    </label>

                    <div class="file-input-wrapper">

                        <input
                            type="file"
                            id="edit_gambar"
                            name="gambar"
                            accept="image/*">

                        <label
                            for="edit_gambar"
                            class="file-button">

                            Pilih File

                        </label>

                        <span id="namaFileEdit">
                            Tidak ada file yang dipilih
                        </span>

                    </div>

                    <small style="display:block; margin-top:7px; color:#777;">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>


                <!-- JUDUL -->

                <div class="form-group">

                    <label for="edit_judul">
                        Judul Gambar
                    </label>

                    <input
                        type="text"
                        id="edit_judul"
                        name="judul"
                        required>

                </div>


                <!-- TANGGAL -->

                <div class="form-group">

                    <label for="edit_tanggal">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        id="edit_tanggal"
                        name="tanggal"
                        required>

                </div>

            </div>


            <!-- FOOTER -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="tutupEditGambar()">

                    <i class="fa-solid fa-xmark"></i>

                    Batal

                </button>


                <button
                    type="submit"
                    class="save-btn">

                    <i class="fa-solid fa-check"></i>

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

    /* ==========================================
       TOGGLE SIDEBAR
    ========================================== */

    const toggleBtn =
        document.getElementById('toggleBtn');

    const sidebar =
        document.getElementById('sidebar');


    toggleBtn.addEventListener('click', function () {

        if (window.innerWidth <= 700) {

            sidebar.classList.toggle('mobile-open');

            toggleBtn.classList.toggle('mobile-toggle-open');

        } else {

            sidebar.classList.toggle('hide');

        }

    });


    /* ==========================================
       MODAL TAMBAH
    ========================================== */

    function bukaTambahGambar() {

        document
            .getElementById('modalTambahGambar')
            .classList.add('show');

    }


    function tutupTambahGambar() {

        document
            .getElementById('modalTambahGambar')
            .classList.remove('show');

    }


    /* ==========================================
       NAMA FILE TAMBAH
    ========================================== */

    const inputGambar =
        document.getElementById('gambar');

    const namaFile =
        document.getElementById('namaFile');


    if (inputGambar) {

        inputGambar.addEventListener('change', function () {

            if (this.files.length > 0) {

                namaFile.textContent =
                    this.files[0].name;

            } else {

                namaFile.textContent =
                    'Tidak ada file yang dipilih';

            }

        });

    }


    /* ==========================================
       MODAL EDIT
    ========================================== */

    function bukaEditGambar(id, judul, tanggal) {

        document
            .getElementById('modalEditGambar')
            .classList.add('show');


        document.getElementById('edit_judul').value =
            judul;


        document.getElementById('edit_tanggal').value =
            tanggal;


        document.getElementById('formEditGambar').action =
            '/backend/galeri/' + id;


        document.getElementById('namaFileEdit').textContent =
            'Tidak ada file yang dipilih';

    }


    function tutupEditGambar() {

        document
            .getElementById('modalEditGambar')
            .classList.remove('show');

    }


    /* ==========================================
       NAMA FILE EDIT
    ========================================== */

    const inputEditGambar =
        document.getElementById('edit_gambar');

    const namaFileEdit =
        document.getElementById('namaFileEdit');


    if (inputEditGambar) {

        inputEditGambar.addEventListener('change', function () {

            if (this.files.length > 0) {

                namaFileEdit.textContent =
                    this.files[0].name;

            } else {

                namaFileEdit.textContent =
                    'Tidak ada file yang dipilih';

            }

        });

    }


    /* ==========================================
       KLIK DI LUAR MODAL TAMBAH
    ========================================== */

    const modalTambahGambar =
        document.getElementById('modalTambahGambar');


    modalTambahGambar.addEventListener('click', function (event) {

        if (event.target === this) {

            tutupTambahGambar();

        }

    });


    /* ==========================================
       KLIK DI LUAR MODAL EDIT
    ========================================== */

    const modalEditGambar =
        document.getElementById('modalEditGambar');


    modalEditGambar.addEventListener('click', function (event) {

        if (event.target === this) {

            tutupEditGambar();

        }

    });


    /* ==========================================
       SEARCH GALERI
    ========================================== */

    const searchGallery =
        document.getElementById('searchGallery');

    const galleryGrid =
        document.getElementById('galleryGrid');


    if (searchGallery) {

        searchGallery.addEventListener('input', function () {

            const keyword =
                this.value.toLowerCase().trim();

            const cards =
                galleryGrid.querySelectorAll('.gallery-card');


            cards.forEach(function (card) {

                const text =
                    card.innerText.toLowerCase();


                if (text.includes(keyword)) {

                    card.style.display = '';

                } else {

                    card.style.display = 'none';

                }

            });

        });

    }


    /* ==========================================
       RESET SEARCH
    ========================================== */

    function resetGallerySearch() {

        searchGallery.value = '';

        const cards =
            galleryGrid.querySelectorAll('.gallery-card');


        cards.forEach(function (card) {

            card.style.display = '';

        });

    }

</script>

</body>
</html>