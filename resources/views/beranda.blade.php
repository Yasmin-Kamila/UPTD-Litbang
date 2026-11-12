<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Beranda - UPTD Litbang Plered</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="website">

@include('layouts.navbar')


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-content">

            <div class="hero-text">

                <p class="welcome">
                    Selamat Datang di Website
                </p>

                <h1>
                    UPTD LITBANG KERAMIK
                </h1>

                <h2>
                    PLERED PURWAKARTA
                </h2>

                <p class="description">
                    UPTD Litbang Keramik Plered merupakan unit pelaksana teknis
                    yang bergerak dalam penelitian, pengembangan, pembinaan dan
                    pelayanan teknologi keramik bagi masyarakat dan pelaku usaha.
                </p>

                <a href="{{ route('profil') }}" class="hero-button">
                    Profil Kami
                </a>

            </div>


            <div class="hero-image">

                <img src="{{ asset('images/kantor.jpg') }}"
                     alt="Gedung UPTD Litbang Keramik Plered">

            </div>

        </div>

    </section>


    <!-- ================= LAYANAN ================= -->

    <section class="layanan">

        <h2 class="section-title">
            Layanan Kami
        </h2>


        <div class="layanan-list">

            @forelse ($layanan as $item)

                <div class="layanan-card {{ $loop->even ? 'darker' : '' }}">

                    <div class="layanan-icon">

                        @if ($loop->iteration == 1)
                            💼
                        @elseif ($loop->iteration == 2)
                            🚐
                        @elseif ($loop->iteration == 3)
                            ⚖️
                        @elseif ($loop->iteration == 4)
                            📢
                        @else
                            💼
                        @endif

                    </div>


                    <h3>
                        {{ $item->judul }}
                    </h3>


                    <p>
                        {{ $item->deskripsi }}
                    </p>

                </div>

            @empty

                <div class="data-kosong">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>Belum ada layanan yang tersedia.</p>
                </div>

            @endforelse

        </div>


        <div class="layanan-button-area">

            <a href="{{ route('layanan') }}">
                Lihat Selengkapnya
            </a>

        </div>

    </section>


    <!-- ================= TERBARU & DOKUMENTASI ================= -->

    <section class="terbaru">

        <div class="terbaru-content">


            <!-- ================= TERBARU DARI KAMI ================= -->

            <div class="terbaru-kiri">

                <h2>
                    Terbaru dari Kami
                </h2>


                <div class="artikel-mini">

                    @forelse ($artikels as $artikel)

                        <a href="{{ route('artikel.detail', $artikel->id_artikel) }}"
                           class="artikel-mini-card">

                            <div class="mini-image">

                                @if ($artikel->gambar)

                                    <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                         alt="{{ $artikel->judul }}">

                                @else

                                    <img src="{{ asset('images/kegiatan1.jpg') }}"
                                         alt="{{ $artikel->judul }}">

                                @endif

                            </div>


                            <div class="mini-info">

                                <h3>
                                    {{ $artikel->judul }}
                                </h3>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 100) }}
                                </p>

                                <span class="baca-artikel">
                                    Baca Selengkapnya →
                                </span>

                            </div>

                        </a>

                    @empty

                        <div class="data-kosong artikel-kosong">
                            <i class="fa-solid fa-newspaper"></i>
                            <p>Belum ada artikel terbaru.</p>
                        </div>

                    @endforelse

                </div>

            </div>


            <!-- ================= DOKUMENTASI ================= -->

            <div class="dokumentasi">

                <h2>
                    Dokumentasi Kegiatan
                </h2>


                <div class="dokumentasi-grid">

                    @forelse ($galeri as $item)

                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             alt="{{ $item->judul }}">

                    @empty

                        <div class="data-kosong galeri-kosong">
                            <i class="fa-solid fa-image"></i>
                            <p>Belum ada dokumentasi kegiatan.</p>
                        </div>

                    @endforelse

                </div>


                <div class="selengkapnya-area">

                    <a href="{{ route('galeri') }}">
                        Lihat Selengkapnya
                    </a>

                </div>

            </div>

        </div>

    </section>

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