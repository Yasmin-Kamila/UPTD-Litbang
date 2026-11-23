<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User - UPTD Litbang Keramik</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/backend/user.css') }}">
</head>

<body>

<div class="dashboard">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="brand-text">
                <strong>UPTD LITBANG KERAMIK</strong>
                <span>PLERED PURWAKARTA</span>
            </div>

        </div>

        <div class="sidebar-line"></div>

        <p class="menu-title">MENU UTAMA</p>

        <nav class="menu">

            <a href="{{ route('backend.beranda') }}" class="menu-item">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('backend.profil') }}" class="menu-item">
                <i class="fa-solid fa-user"></i>
                <span>Profil</span>
            </a>

            <a href="{{ route('backend.galeri') }}" class="menu-item">
                <i class="fa-regular fa-image"></i>
                <span>Galeri</span>
            </a>

            <a href="{{ route('backend.artikel') }}" class="menu-item">
                <i class="fa-solid fa-file-lines"></i>
                <span>Artikel</span>
            </a>

            <a href="{{ route('backend.layanan') }}" class="menu-item">
                <i class="fa-solid fa-briefcase"></i>
                <span>Layanan</span>
            </a>

            <a href="{{ route('backend.organigram') }}" class="menu-item">
                <i class="fa-solid fa-sitemap"></i>
                <span>Organigram</span>
            </a>

            <a href="{{ route('backend.user') }}" class="menu-item active">
                <i class="fa-solid fa-users"></i>
                <span>User</span>
            </a>

        </nav>

        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>KELUAR</span>
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
                    type="button"
                >
                    <i class="fa-solid fa-bars"></i>
                </button>

                <h1>User</h1>

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


        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content">


            <!-- =================================================
                 CONTENT HEADER
            ================================================== -->

            <div class="content-header">

                <h2>Data User</h2>

                <button
                    type="button"
                    class="btn-tambah"
                    onclick="openTambahUser()"
                >
                    <i class="fa-solid fa-plus"></i>
                    Tambah User
                </button>

            </div>


            <!-- =================================================
                 SEARCH
            ================================================== -->

            <div class="search-area">

                <div class="search-box">

                    <label for="search">Cari</label>

                    <div class="search-input">

                        <input
                            type="text"
                            id="search"
                            placeholder="Cari nama"
                            onkeyup="searchUser()"
                        >

                        <i class="fa-solid fa-magnifying-glass"></i>

                    </div>

                </div>


                <button
                    type="button"
                    class="reset-button"
                    onclick="resetSearch()"
                >
                    <i class="fa-regular fa-circle-xmark"></i>
                    Reset Filter
                </button>

            </div>


            <!-- =================================================
                 TABLE
            ================================================== -->

            <div class="table-container">

                <table id="userTable">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $index => $user)

                        <tr>

                            <td>
                                {{ $index + 1 }}.
                            </td>

                            <td>
                                {{ $user->nama }}
                            </td>

                            <td>
                                {{ $user->username }}
                            </td>

                            <td>
                                **********
                            </td>

                            <td>
                                {{ ucfirst($user->role) }}
                            </td>

                            <td>

                                <div class="action-buttons">


                                    <!-- EDIT -->

                                    <button
                                        type="button"
                                        class="btn-edit"
                                        onclick="openEditUser(
                                            '{{ $user->id_user }}',
                                            '{{ addslashes($user->nama) }}',
                                            '{{ addslashes($user->username) }}',
                                            '{{ $user->role }}'
                                        )"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                        Edit
                                    </button>


                                    <!-- DELETE -->

                                    <form
                                        action="{{ route('backend.user.destroy', $user->id_user) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-delete"
                                        >
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
                                colspan="6"
                                class="empty-data"
                            >
                                Belum ada data user.
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
     MODAL TAMBAH USER
========================================================= -->

<div class="modal" id="modalTambah">

    <div class="modal-box">


        <!-- HEADER -->

        <div class="modal-header">

            <h3>Tambah User</h3>

            <button
                type="button"
                onclick="closeModal('modalTambah')"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- FORM -->

        <form
            action="{{ route('backend.user.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="tambahNama">
                    Nama
                </label>

                <input
                    type="text"
                    id="tambahNama"
                    name="nama"
                    required
                >

            </div>


            <div class="form-group">

                <label for="tambahUsername">
                    Username
                </label>

                <input
                    type="text"
                    id="tambahUsername"
                    name="username"
                    required
                >

            </div>


            <div class="form-group">

                <label for="tambahPassword">
                    Password
                </label>

                <input
                    type="password"
                    id="tambahPassword"
                    name="password"
                    required
                >

            </div>


            <div class="form-group">

                <label for="tambahRole">
                    Role
                </label>

                <select
                    id="tambahRole"
                    name="role"
                    required
                >

                    <option
                        value=""
                        selected
                        disabled
                    ></option>

                    <option value="admin">
                        Admin
                    </option>

                    <option value="user">
                        User
                    </option>

                </select>

            </div>


            <!-- FOOTER -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-batal"
                    onclick="closeModal('modalTambah')"
                >
                    <i class="fa-solid fa-xmark"></i>
                    Batal
                </button>


                <button
                    type="submit"
                    class="btn-simpan"
                >
                    <i class="fa-solid fa-check"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT USER
========================================================= -->

<div class="modal" id="modalEdit">

    <div class="modal-box">


        <!-- HEADER -->

        <div class="modal-header">

            <h3>Edit User</h3>

            <button
                type="button"
                onclick="closeModal('modalEdit')"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>


        <!-- FORM -->

        <form
            id="editUserForm"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="editNama">
                    Nama
                </label>

                <input
                    type="text"
                    id="editNama"
                    name="nama"
                    required
                >

            </div>


            <div class="form-group">

                <label for="editUsername">
                    Username
                </label>

                <input
                    type="text"
                    id="editUsername"
                    name="username"
                    required
                >

            </div>


            <div class="form-group">

                <label for="editPassword">
                    Password
                </label>

                <input
                    type="password"
                    id="editPassword"
                    name="password"
                    placeholder="Kosongkan jika tidak diganti"
                >

            </div>


            <div class="form-group">

                <label for="editRole">
                    Role
                </label>

                <select
                    id="editRole"
                    name="role"
                    required
                >

                    <option value="admin">
                        Admin
                    </option>

                    <option value="user">
                        User
                    </option>

                </select>

            </div>


            <!-- FOOTER -->

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn-batal"
                    onclick="closeModal('modalEdit')"
                >
                    <i class="fa-solid fa-xmark"></i>
                    Batal
                </button>


                <button
                    type="submit"
                    class="btn-simpan"
                >
                    <i class="fa-solid fa-check"></i>
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
   SIDEBAR TOGGLE
===================================================== */

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



/* =====================================================
   TAMBAH USER
===================================================== */

function openTambahUser() {

    document
        .getElementById('modalTambah')
        .classList.add('show');

}



/* =====================================================
   EDIT USER
===================================================== */

function openEditUser(id, nama, username, role) {

    document.getElementById('editNama').value = nama;

    document.getElementById('editUsername').value = username;

    document.getElementById('editRole').value = role;

    document.getElementById('editPassword').value = '';

    document.getElementById('editUserForm').action =
        "{{ url('/backend/user') }}/" + id;

    document
        .getElementById('modalEdit')
        .classList.add('show');

}



/* =====================================================
   CLOSE MODAL
===================================================== */

function closeModal(id) {

    document
        .getElementById(id)
        .classList.remove('show');

}



/* =====================================================
   SEARCH USER
===================================================== */

function searchUser() {

    const input = document
        .getElementById('search')
        .value
        .toLowerCase();

    const rows = document.querySelectorAll(
        '#userTable tbody tr'
    );


    rows.forEach(function(row) {

        const nama = row.children[1];

        if (!nama) {
            return;
        }

        const text =
            nama.textContent.toLowerCase();

        row.style.display =
            text.includes(input)
                ? ''
                : 'none';

    });

}



/* =====================================================
   RESET SEARCH
===================================================== */

function resetSearch() {

    document.getElementById('search').value = '';

    searchUser();

}



/* =====================================================
   CLICK DI LUAR MODAL
===================================================== */

window.addEventListener('click', function(event) {

    const modalTambah =
        document.getElementById('modalTambah');

    const modalEdit =
        document.getElementById('modalEdit');


    if (event.target === modalTambah) {

        modalTambah.classList.remove('show');

    }


    if (event.target === modalEdit) {

        modalEdit.classList.remove('show');

    }

});

</script>

</body>

</html>