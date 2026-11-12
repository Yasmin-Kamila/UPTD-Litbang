<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Organigram - UPTD Litbang Plered</title>

    <link rel="stylesheet" href="{{ asset('css/organigram.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="website">

    <!-- ================= NAVBAR ================= -->

    <header class="navbar">

        <div class="brand">

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="brand-name">
                <strong>UPTD LITBANG</strong>
                <span>PLERED PURWAKARTA</span>
            </div>

        </div>


        <!-- MENU -->

        <nav class="menu" id="menu">

            <a href="{{ route('beranda') }}">
                Beranda
            </a>

            <a href="{{ route('profil') }}">
                Profil
            </a>

            <a href="{{ route('layanan') }}">
                Layanan
            </a>

            <a href="{{ route('galeri') }}">
                Galeri
            </a>

            <a href="{{ route('artikel') }}">
                Artikel
            </a>

            <a href="{{ route('organigram') }}" class="active">
                Organigram
            </a>

        </nav>


        <!-- HAMBURGER -->

        <button class="menu-toggle" onclick="toggleMenu()">
            <i class="fa-solid fa-bars"></i>
        </button>

    </header>


    <!-- ================= KONTEN ================= -->

    <main class="content">

        <h1 class="page-title">
            STRUKTUR ORGANISASI
        </h1>


        <section class="organization">


            @if($organigram->count() > 0)


                <!-- ================= KEPALA UPTD ================= -->

                <div class="org-top">

                    <div class="person-card">

                        <div class="person-photo">

                            @if($organigram[0]->gambar)

                                <img src="{{ asset('storage/' . $organigram[0]->gambar) }}"
                                     alt="{{ $organigram[0]->nama }}">

                            @else

                                <i class="fa-solid fa-user"></i>

                            @endif

                        </div>


                        <div class="person-info">

                            <h3>
                                {{ $organigram[0]->nama }}
                            </h3>

                            <p>
                                {{ $organigram[0]->jabatan }}
                            </p>

                        </div>

                    </div>

                </div>


                <!-- ================= GARIS DARI KEPALA ================= -->

                @if($organigram->count() > 1)

                    <div class="line-top"></div>

                @endif


                <!-- ================= LEVEL 2 ================= -->

                @if($organigram->count() > 1)

                    <div class="org-middle">

                        @foreach($organigram->slice(1, 3) as $item)

                            <div class="person-card">

                                <div class="person-photo">

                                    @if($item->gambar)

                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                             alt="{{ $item->nama }}">

                                    @else

                                        <i class="fa-solid fa-user"></i>

                                    @endif

                                </div>


                                <div class="person-info">

                                    <h3>
                                        {{ $item->nama }}
                                    </h3>

                                    <p>
                                        {{ $item->jabatan }}
                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


                <!-- ================= LEVEL 3 ================= -->

                @if($organigram->count() > 4)

                    <div class="org-bottom">

                        @foreach($organigram->slice(4) as $item)

                            <div class="person-card">

                                <div class="person-photo">

                                    @if($item->gambar)

                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                             alt="{{ $item->nama }}">

                                    @else

                                        <i class="fa-solid fa-user"></i>

                                    @endif

                                </div>


                                <div class="person-info">

                                    <h3>
                                        {{ $item->nama }}
                                    </h3>

                                    <p>
                                        {{ $item->jabatan }}
                                    </p>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


            @else


                <!-- ================= DATA KOSONG ================= -->

                <div class="empty-organigram">

                    <i class="fa-solid fa-sitemap"></i>

                    <p>
                        Belum ada data struktur organisasi.
                    </p>

                </div>


            @endif

        </section>

    </main>

    @include('layouts.footer')

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

function toggleMenu() {

    const menu = document.getElementById("menu");

    menu.classList.toggle("show");

}

</script>

</body>
</html>