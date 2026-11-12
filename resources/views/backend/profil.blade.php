<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - UPTD Litbang Keramik Plered Purwakarta</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/backend/profil.css') }}">

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

                <span>PLERED PURWAKARTA</span>

            </div>

        </div>


        <div class="sidebar-line"></div>


        <div class="menu-title">
            MENU UTAMA
        </div>


        <nav class="menu">

            <a href="{{ route('backend.beranda') }}"
               class="menu-item">

                <i class="fa-solid fa-house"></i>

                <span>Dashboard</span>

            </a>


            <a href="{{ route('backend.profil') }}"
               class="menu-item active">

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
               class="menu-item">

                <i class="fa-solid fa-layer-group"></i>

                <span>Layanan</span>

            </a>


            <a href="{{ route('backend.organigram') }}"
               class="menu-item">

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


        <!-- ================= TOPBAR ================= -->

        <header class="topbar">

            <div class="topbar-left">

                <button
                    class="toggle-btn"
                    id="toggleBtn"
                    type="button">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <h1>Profil</h1>

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


            <!-- JUDUL -->

            <div class="page-heading">

                <h2>
                    Profil UPTD
                </h2>

                <p>
                    Kelola informasi website UPTD Litbang Keramik
                    Plered Purwakarta dengan mudah.
                </p>

            </div>



            <!-- ================= PESAN ================= -->

            @if (session('success'))

                <div class="alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}

                </div>

            @endif


            @if ($errors->any())

                <div class="alert-error">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- ================= FORM ================= -->

            <form
                id="profilForm"
                action="{{ route('backend.profil.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')



                <!-- ================= PROFIL ================= -->

                <div class="profile-grid">


                    <!-- ================= KIRI ================= -->

                    <div class="profile-card">

                        <h3>
                            Informasi Profil
                        </h3>



                        <!-- JUDUL -->

                        <div class="form-group">

                            <label for="judul">
                                Judul
                            </label>

                            <input
                                type="text"
                                id="judul"
                                name="judul"
                                value="{{ old('judul', $profil->judul ?? 'UPTD Litbang Keramik Plered Purwakarta') }}"
                                required>

                        </div>



                        <!-- GAMBAR -->

                        <div class="form-group">

                            <label>
                                Gambar
                            </label>


                            <div class="image-preview">

                                @if ($profil && $profil->gambar)

                                    <img
                                        id="previewGambar"
                                        src="{{ asset('storage/' . $profil->gambar) }}"
                                        alt="Gambar Profil">

                                @else

                                    <div
                                        class="image-placeholder"
                                        id="imagePlaceholder">
                                    </div>

                                @endif

                            </div>

                        </div>



                        <!-- UPLOAD -->

                        <label
                            for="gambarProfil"
                            class="upload-btn">

                            <i class="fa-solid fa-upload"></i>

                            Upload Gambar

                        </label>


                        <input
                            type="file"
                            id="gambarProfil"
                            name="gambar"
                            accept="image/*"
                            hidden>

                    </div>



                    <!-- ================= KANAN ================= -->

                    <div class="profile-card description-card">

                        <h3>
                            Deskripsi
                        </h3>



                        <!-- EDITOR -->

                        <div class="editor">


                            <!-- TOOLBAR -->

                            <div class="editor-toolbar">


                                <!-- PARAGRAPH -->

                                <select id="formatBlock">

                                    <option value="p">
                                        Paragraph
                                    </option>

                                    <option value="h1">
                                        Heading 1
                                    </option>

                                    <option value="h2">
                                        Heading 2
                                    </option>

                                    <option value="h3">
                                        Heading 3
                                    </option>

                                </select>



                                <!-- BOLD -->

                                <button
                                    type="button"
                                    data-command="bold">

                                    <i class="fa-solid fa-bold"></i>

                                </button>



                                <!-- ITALIC -->

                                <button
                                    type="button"
                                    data-command="italic">

                                    <i class="fa-solid fa-italic"></i>

                                </button>



                                <!-- UNDERLINE -->

                                <button
                                    type="button"
                                    data-command="underline">

                                    <i class="fa-solid fa-underline"></i>

                                </button>



                                <!-- STRIKE -->

                                <button
                                    type="button"
                                    data-command="strikeThrough">

                                    <i class="fa-solid fa-strikethrough"></i>

                                </button>



                                <!-- UNDO -->

                                <button
                                    type="button"
                                    data-command="undo">

                                    <i class="fa-solid fa-rotate-left"></i>

                                </button>



                                <!-- REDO -->

                                <button
                                    type="button"
                                    data-command="redo">

                                    <i class="fa-solid fa-rotate-right"></i>

                                </button>



                                <!-- ALIGN LEFT -->

                                <button
                                    type="button"
                                    data-command="justifyLeft">

                                    <i class="fa-solid fa-align-left"></i>

                                </button>



                                <!-- ALIGN CENTER -->

                                <button
                                    type="button"
                                    data-command="justifyCenter">

                                    <i class="fa-solid fa-align-center"></i>

                                </button>



                                <!-- ALIGN RIGHT -->

                                <button
                                    type="button"
                                    data-command="justifyRight">

                                    <i class="fa-solid fa-align-right"></i>

                                </button>



                                <!-- JUSTIFY -->

                                <button
                                    type="button"
                                    data-command="justifyFull">

                                    <i class="fa-solid fa-align-justify"></i>

                                </button>



                                <!-- LINK -->

                                <button
                                    type="button"
                                    data-command="createLink">

                                    <i class="fa-solid fa-link"></i>

                                </button>



                                <!-- LIST -->

                                <button
                                    type="button"
                                    data-command="insertUnorderedList">

                                    <i class="fa-solid fa-list"></i>

                                </button>



                                <!-- NUMBER LIST -->

                                <button
                                    type="button"
                                    data-command="insertOrderedList">

                                    <i class="fa-solid fa-list-ol"></i>

                                </button>


                            </div>



                            <!-- EDITOR CONTENT -->

                            <div
                                class="editor-content"
                                id="editorContent"
                                contenteditable="true">{!! $data['deskripsi'] !!}</div>


                        </div>



                        <!-- DATA DESKRIPSI -->

                        <input
                            type="hidden"
                            name="deskripsi"
                            id="deskripsi">



                        <!-- SEJARAH -->

                        <div class="form-group sejarah">

                            <label for="sejarah">
                                Sejarah Singkat
                            </label>

                            <textarea
                                id="sejarah"
                                name="sejarah"
                                rows="5"
                                required>{{ $data['sejarah'] }}</textarea>

                        </div>

                    </div>

                </div>



                <!-- ================= VISI MISI ================= -->

                <div class="visi-misi-grid">


                    <!-- VISI -->

                    <div class="profile-card visi-card">

                        <h3>
                            Visi
                        </h3>

                        <textarea
                            id="visi"
                            name="visi"
                            rows="7"
                            required>{{ $data['visi'] }}</textarea>

                    </div>



                    <!-- MISI -->

                    <div class="profile-card misi-card">

                        <h3>
                            Misi
                        </h3>

                        <textarea
                            id="misi"
                            name="misi"
                            rows="7"
                            required>{{ $data['misi'] }}</textarea>

                    </div>

                </div>



                <!-- ================= SIMPAN ================= -->

                <div class="save-area">

                    <button
                        class="save-btn"
                        type="submit">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan

                    </button>

                </div>


            </form>

        </section>

    </main>


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
       UPLOAD GAMBAR
    ========================= */

    const gambarProfil =
        document.getElementById('gambarProfil');

    const previewGambar =
        document.getElementById('previewGambar');


    gambarProfil.addEventListener('change', function () {

        const file =
            this.files[0];


        if (!file) {

            return;

        }


        const reader =
            new FileReader();


        reader.onload =
            function (event) {

                if (previewGambar) {

                    previewGambar.src =
                        event.target.result;

                } else {

                    const placeholder =
                        document.getElementById('imagePlaceholder');

                    if (placeholder) {

                        placeholder.innerHTML =
                            '<img id="previewGambar" src="' +
                            event.target.result +
                            '" alt="Preview Gambar">';

                    }

                }

            };


        reader.readAsDataURL(file);

    });



    /* =========================
       EDITOR
    ========================= */

    const editor =
        document.getElementById('editorContent');


    const formatBlock =
        document.getElementById('formatBlock');


    const toolbarButtons =
        document.querySelectorAll(
            '.editor-toolbar button'
        );



    /* =========================
       PARAGRAPH / HEADING
    ========================= */

    formatBlock.addEventListener(
        'change',
        function () {

            editor.focus();


            document.execCommand(
                'formatBlock',
                false,
                this.value
            );

        }
    );



    /* =========================
       TOOLBAR BUTTON
    ========================= */

    toolbarButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    const command =
                        this.getAttribute(
                            'data-command'
                        );


                    editor.focus();


                    if (
                        command ===
                        'createLink'
                    ) {

                        const url =
                            prompt(
                                'Masukkan URL:'
                            );


                        if (url) {

                            document.execCommand(
                                'createLink',
                                false,
                                url
                            );

                        }

                    } else {

                        document.execCommand(
                            command,
                            false,
                            null
                        );

                    }

                }
            );

        }
    );



    /* =========================
       SIMPAN EDITOR
    ========================= */

    const form = document.getElementById('profilForm');

    const deskripsi = document.getElementById('deskripsi');

    form.addEventListener('submit', function () {

        deskripsi.value = editor.innerHTML;

    });


</script>


</body>

</html>