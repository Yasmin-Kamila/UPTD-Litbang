<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel - UPTD Litbang Keramik</title>

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/artikel.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="website">

    @include('layouts.navbar')


    <!-- ================= ARTIKEL ================= -->

    <main class="artikel">

        <h1>
            ARTIKEL
        </h1>

        <div class="artikel-grid">

            @forelse ($artikel as $item)

                <article class="artikel-card">

                    <!-- GAMBAR -->

                    <div class="artikel-image">

                        @if ($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}">

                        @else

                            <img
                                src="{{ asset('images/kegiatan1.jpg') }}"
                                alt="{{ $item->judul }}">

                        @endif

                    </div>


                    <!-- INFORMASI ARTIKEL -->

                    <div class="artikel-content">

                        <div class="tanggal">

                            <i class="fa-regular fa-calendar"></i>

                            @if ($item->tanggal)
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            @endif

                        </div>


                        <h2>
                            {{ $item->judul }}
                        </h2>


                        <p class="artikel-isi">

                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 150) }}

                        </p>


                        <!-- TOMBOL DETAIL -->

                        <a href="{{ route('artikel.detail', $item->id_artikel) }}"
                           class="baca-selengkapnya">

                            Baca Selengkapnya

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </article>


            @empty

                <div class="artikel-kosong">

                    <i class="fa-solid fa-circle-info"></i>

                    <p>
                        Belum ada artikel yang tersedia.
                    </p>

                </div>

            @endforelse

        </div>

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