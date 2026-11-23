<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Organigram - UPTD Litbang Keramik</title>

    <link rel="stylesheet"
          href="{{ asset('css/backend/organigram.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="dashboard">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar" id="sidebar">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo UPTD">

            </div>


            <div class="brand-text">

                <strong>UPTD LITBANG</strong>
                <strong>KERAMIK</strong>

                <span>Plered Purwakarta</span>

            </div>

        </div>


        <div class="sidebar-line"></div>


        <div class="menu-title">
            Menu Utama
        </div>


        <!-- MENU -->

        <nav class="menu">


            <!-- BERANDA -->

            <a
                href="{{ route('backend.beranda') }}"
                class="menu-item">

                <i class="fa-solid fa-house"></i>

                <span>Dashboard</span>

            </a>


            <!-- PROFIL -->

            <a
                href="{{ route('backend.profil') }}"
                class="menu-item">

                <i class="fa-solid fa-user"></i>

                <span>Profil</span>

            </a>


            <!-- GALERI -->

            <a
                href="{{ route('backend.galeri') }}"
                class="menu-item">

                <i class="fa-solid fa-image"></i>

                <span>Galeri</span>

            </a>


            <!-- ARTIKEL -->

            <a
                href="{{ route('backend.artikel') }}"
                class="menu-item">

                <i class="fa-solid fa-newspaper"></i>

                <span>Artikel</span>

            </a>


            <!-- LAYANAN -->

            <a
                href="{{ route('backend.layanan') }}"
                class="menu-item">

                <i class="fa-solid fa-layer-group"></i>

                <span>Layanan</span>

            </a>


            <!-- ORGANIGRAM -->

            <a
                href="{{ route('backend.organigram') }}"
                class="menu-item active">

                <i class="fa-solid fa-sitemap"></i>

                <span>Organigram</span>

            </a>


        </nav>


        <!-- =================================================
             LOGOUT
        ================================================== -->

        <div class="logout">

            <form
                action="{{ route('logout') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="logout-button">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Keluar</span>

                </button>

            </form>

        </div>


    </aside>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <header class="topbar">


            <div class="topbar-left">


                <button
                    class="toggle-btn"
                    id="toggleBtn"
                    type="button">

                    <i class="fa-solid fa-bars"></i>

                </button>


                <h1>
                    Organigram
                </h1>


            </div>



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



        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content">


            <!-- SUCCESS ALERT -->

            @if (session('success'))

                <div class="alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif



            <!-- ERROR ALERT -->

            @if ($errors->any())

                <div class="alert-error">

                    <i class="fa-solid fa-circle-exclamation"></i>


                    <div>

                        @foreach ($errors->all() as $error)

                            <span>
                                {{ $error }}
                            </span>

                        @endforeach

                    </div>

                </div>

            @endif



            <!-- =================================================
                 PAGE HEADING
            ================================================== -->

            <div class="page-heading">


                <div>

                    <h2>
                        Data Organigram
                    </h2>


                    <p>
                        Kelola struktur organisasi UPTD Litbang Keramik
                    </p>

                </div>



                <button
                    class="add-button"
                    type="button"
                    onclick="bukaTambah()">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Struktur

                </button>


            </div>



            <!-- =================================================
                 FILTER
            ================================================== -->

            <div class="filter-area">


                <div class="search-area">


                    <label for="search">
                        Cari Nama
                    </label>


                    <div class="search-input">


                        <input
                            type="text"
                            id="search"
                            placeholder="Cari nama..."
                            autocomplete="off">


                        <i class="fa-solid fa-magnifying-glass"></i>


                    </div>


                </div>



                <button
                    class="reset-button"
                    type="button"
                    onclick="resetSearch()">

                    <i class="fa-solid fa-rotate-left"></i>

                    Reset

                </button>


            </div>



            <!-- =================================================
                 TABLE
            ================================================== -->

            <div class="table-wrapper">


                <table>


                    <thead>

                        <tr>


                            <th class="col-no">
                                No
                            </th>


                            <th class="col-gambar">
                                Gambar
                            </th>


                            <th class="col-jabatan">
                                Jabatan
                            </th>


                            <th class="col-nama">
                                Nama
                            </th>


                            <th class="col-aksi">
                                Aksi
                            </th>


                        </tr>

                    </thead>



                    <tbody id="tableBody">


                        @forelse ($organigram as $item)


                            <tr>


                                <!-- NO -->

                                <td class="col-no">


                                    <span class="number">

                                        {{ $loop->iteration }}

                                    </span>


                                </td>



                                <!-- GAMBAR -->

                                <td class="col-gambar">


                                    @if ($item->gambar)


                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->nama }}"
                                            class="organigram-image">


                                    @else


                                        <div class="image-placeholder">

                                            <i class="fa-regular fa-image"></i>

                                        </div>


                                    @endif


                                </td>



                                <!-- JABATAN -->

                                <td class="col-jabatan">


                                    <div class="jabatan">

                                        {{ $item->jabatan }}

                                    </div>


                                </td>



                                <!-- NAMA -->

                                <td class="col-nama">


                                    <div class="nama">

                                        {{ $item->nama }}

                                    </div>


                                </td>



                                <!-- AKSI -->

                                <td class="col-aksi action">


                                    <div class="action-buttons">


                                        <!-- EDIT -->

                                        <button
                                            type="button"
                                            class="edit-btn"
                                            onclick="bukaEdit(
                                                {{ $item->id_organigram }},
                                                @js($item->nama),
                                                @js($item->jabatan)
                                            )">

                                            <i class="fa-solid fa-pen"></i>

                                            Edit

                                        </button>



                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('backend.organigram.destroy', $item->id_organigram) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="delete-btn">

                                                <i class="fa-solid fa-trash"></i>

                                                Delete

                                            </button>


                                        </form>


                                    </div>


                                </td>


                            </tr>


                        @empty


                            <tr>


                                <td
                                    colspan="5"
                                    class="empty-data">


                                    <i class="fa-solid fa-sitemap"></i>


                                    <p>
                                        Belum ada data organigram.
                                    </p>


                                </td>


                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>


        </section>


    </main>


</div>



<!-- =========================================================
     MODAL TAMBAH
========================================================= -->

<div
    class="modal"
    id="modalTambah">


    <div class="modal-box">


        <div class="modal-header">


            <h2>
                Tambah Struktur
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="tutupTambah()">

                &times;

            </button>


        </div>



        <form
            action="{{ route('backend.organigram.store') }}"
            method="POST"
            enctype="multipart/form-data">


            @csrf


            <div class="form-body">


                <!-- GAMBAR -->

                <div class="form-group">


                    <label for="gambar">
                        Gambar
                    </label>


                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        accept="image/*"
                        required>


                </div>



                <!-- JABATAN -->

                <div class="form-group">


                    <label for="jabatan">
                        Jabatan
                    </label>


                    <input
                        type="text"
                        id="jabatan"
                        name="jabatan"
                        placeholder="Masukkan jabatan"
                        required>


                </div>



                <!-- NAMA -->

                <div class="form-group">


                    <label for="nama">
                        Nama
                    </label>


                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama"
                        required>


                </div>


            </div>



            <div class="modal-footer">


                <button
                    type="button"
                    class="cancel-btn"
                    onclick="tutupTambah()">


                    <i class="fa-solid fa-xmark"></i>

                    Batal


                </button>



                <button
                    type="submit"
                    class="save-btn">


                    <i class="fa-solid fa-floppy-disk"></i>

                    Simpan


                </button>


            </div>


        </form>


    </div>


</div>



<!-- =========================================================
     MODAL EDIT
========================================================= -->

<div
    class="modal"
    id="modalEdit">


    <div class="modal-box">


        <div class="modal-header">


            <h2>
                Edit Struktur
            </h2>


            <button
                type="button"
                class="close-modal"
                onclick="tutupEdit()">

                &times;

            </button>


        </div>



        <form
            id="formEdit"
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


                    <input
                        type="file"
                        id="edit_gambar"
                        name="gambar"
                        accept="image/*">


                    <small>
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>


                </div>



                <!-- JABATAN -->

                <div class="form-group">


                    <label for="edit_jabatan">
                        Jabatan
                    </label>


                    <input
                        type="text"
                        id="edit_jabatan"
                        name="jabatan"
                        placeholder="Masukkan jabatan"
                        required>


                </div>



                <!-- NAMA -->

                <div class="form-group">


                    <label for="edit_nama">
                        Nama
                    </label>


                    <input
                        type="text"
                        id="edit_nama"
                        name="nama"
                        placeholder="Masukkan nama"
                        required>


                </div>


            </div>



            <div class="modal-footer">


                <button
                    type="button"
                    class="cancel-btn"
                    onclick="tutupEdit()">


                    <i class="fa-solid fa-xmark"></i>

                    Batal


                </button>



                <button
                    type="submit"
                    class="save-btn">


                    <i class="fa-solid fa-floppy-disk"></i>

                    Simpan


                </button>


            </div>


        </form>


    </div>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    /* =====================================================
       SIDEBAR
    ====================================================== */

    const toggleBtn =
        document.getElementById('toggleBtn');


    const sidebar =
        document.getElementById('sidebar');



    toggleBtn.addEventListener('click', function () {


        if (window.innerWidth <= 700) {


            sidebar.classList.toggle('mobile-open');


            toggleBtn.classList.toggle(
                'mobile-toggle-open'
            );


        } else {


            sidebar.classList.toggle('hide');


        }


    });



    /* =====================================================
       MODAL TAMBAH
    ====================================================== */

    function bukaTambah() {


        document
            .getElementById('modalTambah')
            .classList.add('show');


    }



    function tutupTambah() {


        document
            .getElementById('modalTambah')
            .classList.remove('show');


    }



    /* =====================================================
       MODAL EDIT
    ====================================================== */

    function bukaEdit(id, nama, jabatan) {


        document
            .getElementById('modalEdit')
            .classList.add('show');



        document
            .getElementById('edit_nama')
            .value = nama;



        document
            .getElementById('edit_jabatan')
            .value = jabatan;



        document
            .getElementById('edit_gambar')
            .value = '';



        document
            .getElementById('formEdit')
            .action =
            '/backend/organigram/' + id;


    }



    function tutupEdit() {


        document
            .getElementById('modalEdit')
            .classList.remove('show');


    }



    /* =====================================================
       CLOSE MODAL KLIK LUAR
    ====================================================== */

    window.addEventListener('click', function (event) {


        const modalTambah =
            document.getElementById('modalTambah');


        const modalEdit =
            document.getElementById('modalEdit');



        if (event.target === modalTambah) {


            tutupTambah();


        }



        if (event.target === modalEdit) {


            tutupEdit();


        }


    });



    /* =====================================================
       SEARCH
    ====================================================== */

    const searchInput =
        document.getElementById('search');



    searchInput.addEventListener('keyup', function () {


        const keyword =
            this.value.toLowerCase();



        const rows =
            document.querySelectorAll(
                '#tableBody tr'
            );



        rows.forEach(function (row) {


            const text =
                row.innerText.toLowerCase();



            if (text.includes(keyword)) {


                row.style.display = '';


            } else {


                row.style.display = 'none';


            }


        });


    });



    /* =====================================================
       RESET SEARCH
    ====================================================== */

    function resetSearch() {


        searchInput.value = '';



        const rows =
            document.querySelectorAll(
                '#tableBody tr'
            );



        rows.forEach(function (row) {


            row.style.display = '';


        });


    }


</script>


</body>

</html>