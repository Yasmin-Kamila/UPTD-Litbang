
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $artikel->judul }} - UPTD Litbang Keramik</title>

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail-artikel.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="halaman-detail-artikel">

    @include('layouts.navbar')

    <main class="detail-artikel">

        <a href="{{ route('artikel') }}" class="tombol-kembali">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Artikel
        </a>

        <article class="detail-container">

            <h1>{{ $artikel->judul }}</h1>

            <div class="detail-tanggal">
                <i class="fa-regular fa-calendar"></i>

                @if ($artikel->tanggal)
                    {{ \Carbon\Carbon::parse($artikel->tanggal)->translatedFormat('d F Y') }}
                @endif
            </div>

            @if ($artikel->gambar)
                <div class="detail-gambar">
                    <img
                        src="{{ asset('storage/' . $artikel->gambar) }}"
                        alt="{{ $artikel->judul }}">
                </div>
            @endif

            <div class="detail-isi">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

        </article>

    </main>

    @include('layouts.footer')

    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");

            if (menu) {
                menu.classList.toggle("show");
            }
        }
    </script>

</body>
</html>
