<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Layanan - UPTD Litbang Keramik</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/backend/layanan.css') }}">
</head>

<body>

<div class="dashboard">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar" id="sidebar">

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


        <nav class="menu">

            <a href="{{ route('backend.beranda') }}"
               class="menu-item">

                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>

            </a>


            <a href="{{ route('backend.profil') }}"
               class="menu-item">

                <i class="fa-solid fa-user"></i>
                <span>Profil</span>

            </a>


            <a href="{{ route('backend.galeri') }}"
               class="menu-item">

                <i class="fa-solid fa-image"></i>
                <span>Galeri</span>

            </a>


            <a href="{{ route('backend.artikel') }}"
               class="menu-item">

                <i class="fa-solid fa-newspaper"></i>
                <span>Artikel</span>

            </a>


            <a href="{{ route('backend.layanan') }}"
               class="menu-item active">

                <i class="fa-solid fa-layer-group"></i>
                <span>Layanan</span>

            </a>


            <a href="{{ route('backend.organigram') }}"
               class="menu-item">

                <i class="fa-solid fa-sitemap"></i>
                <span>Organigram</span>

            </a>

        </nav>


        <!-- ================= LOGOUT ================= -->

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

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

                <h1>
                    Layanan
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


        <!-- ================= CONTENT ================= -->

        <section class="content">


            <!-- ================= NOTIFIKASI ================= -->

            @if (session('success'))

                <div class="alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            <!-- ================= JUDUL ================= -->

            <div class="page-heading">

                <div>

                    <h2>
                        Data Layanan
                    </h2>

                    <p>
                        Kelola layanan yang tersedia di UPTD Litbang Keramik
                    </p>

                </div>


                <button
                    class="add-button"
                    type="button"
                    id="btnTambah">

                    <i class="fa-solid fa-plus"></i>

                    Tambah Layanan

                </button>

            </div>


            <!-- ================= FILTER ================= -->

            <div class="filter-area">

                <div class="search-box">

                    <label for="search">
                        Cari Layanan
                    </label>

                    <div class="search-input">

                        <input
                            type="text"
                            id="search"
                            placeholder="Cari judul layanan...">

                        <i class="fa-solid fa-magnifying-glass"></i>

                    </div>

                </div>


                <button
                    class="reset-button"
                    type="button"
                    id="resetSearch">

                    <i class="fa-solid fa-rotate-left"></i>

                    Reset

                </button>

            </div>


            <!-- ================= TABLE ================= -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th class="col-no">
                                No
                            </th>

                            <th class="col-judul">
                                Judul
                            </th>

                            <th class="col-deskripsi">
                                Deskripsi
                            </th>

                            <th class="col-aksi">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="layananTable">

                        @forelse ($layanan as $item)

                            <tr>

                                <td>

                                    <span class="number">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                <td>

                                    <div class="layanan-title">

                                        {{ $item->judul }}

                                    </div>

                                </td>


                                <td>

                                    <div class="layanan-content">

                                        {{ Str::limit(strip_tags($item->deskripsi), 150) }}

                                    </div>

                                </td>


                                <td class="action">

                                    <!-- ================= EDIT ================= -->

                                    <button
                                        type="button"
                                        class="edit-btn"
                                        onclick="editLayanan(
                                            {{ $item->id_layanan }},
                                            @js($item->judul),
                                            @js($item->deskripsi)
                                        )">

                                        <i class="fa-solid fa-pen"></i>

                                        Edit

                                    </button>


                                    <!-- ================= HAPUS ================= -->

                                    <form
                                        action="{{ route('backend.layanan.destroy', $item->id_layanan) }}"
                                        method="POST"
                                        style="display:inline;">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-btn"
                                            onclick="return confirm('Yakin ingin menghapus layanan ini?')">

                                            <i class="fa-solid fa-trash"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="empty-data">

                                    <i class="fa-regular fa-folder-open"></i>

                                    <p>
                                        Belum ada data layanan.
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
     MODAL TAMBAH LAYANAN
========================================================= -->

<div
    class="modal"
    id="modalTambah">

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Tambah Layanan
            </h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('modalTambah')">

                &times;

            </button>

        </div>


        <form
            action="{{ route('backend.layanan.store') }}"
            method="POST">

            @csrf

            <div class="form-body">


                <div class="form-group">

                    <label for="judulTambah">
                        Judul
                    </label>

                    <input
                        type="text"
                        id="judulTambah"
                        name="judul"
                        required>

                </div>


                <div class="form-group">

                    <label for="deskripsiTambah">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsiTambah"
                        name="deskripsi"
                        required></textarea>

                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeModal('modalTambah')">

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
     MODAL EDIT LAYANAN
========================================================= -->

<div
    class="modal"
    id="modalEdit">

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Edit Layanan
            </h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeModal('modalEdit')">

                &times;

            </button>

        </div>


        <form
            id="formEdit"
            method="POST">

            @csrf

            @method('PUT')


            <div class="form-body">


                <div class="form-group">

                    <label for="judulEdit">
                        Judul
                    </label>

                    <input
                        type="text"
                        id="judulEdit"
                        name="judul"
                        required>

                </div>


                <div class="form-group">

                    <label for="deskripsiEdit">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsiEdit"
                        name="deskripsi"
                        required></textarea>

                </div>


            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeModal('modalEdit')">

                    <i class="fa-solid fa-xmark"></i>

                    Batal

                </button>


                <button
                    type="submit"
                    class="save-btn">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    /* =========================
       SIDEBAR
    ========================= */

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


    /* =========================
       TAMBAH LAYANAN
    ========================= */

    const btnTambah =
        document.getElementById('btnTambah');

    const modalTambah =
        document.getElementById('modalTambah');


    btnTambah.addEventListener('click', function () {

        modalTambah.classList.add('show');

    });


    /* =========================
       CLOSE MODAL
    ========================= */

    function closeModal(id) {

        document
            .getElementById(id)
            .classList.remove('show');

    }


    /* =========================
       EDIT LAYANAN
    ========================= */

    function editLayanan(id, judul, deskripsi) {

        const formEdit =
            document.getElementById('formEdit');


        formEdit.action =
            '/backend/layanan/' + id;


        document.getElementById('judulEdit').value =
            judul;


        document.getElementById('deskripsiEdit').value =
            deskripsi;


        document
            .getElementById('modalEdit')
            .classList.add('show');

    }


    /* =========================
       SEARCH
    ========================= */

    const search =
        document.getElementById('search');

    const layananTable =
        document.getElementById('layananTable');


    search.addEventListener('keyup', function () {

        const keyword =
            this.value.toLowerCase();


        const rows =
            layananTable.querySelectorAll('tr');


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


    /* =========================
       RESET SEARCH
    ========================= */

    document
        .getElementById('resetSearch')
        .addEventListener('click', function () {

            search.value = '';


            const rows =
                layananTable.querySelectorAll('tr');


            rows.forEach(function (row) {

                row.style.display = '';

            });

        });


    /* =========================
       KLIK LUAR MODAL
    ========================= */

    window.addEventListener('click', function (event) {

        if (event.target.classList.contains('modal')) {

            event.target.classList.remove('show');

        }

    });

</script>


</body>

</html>