<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - UPTD Litbang Keramik</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/galeri.css') }}">
</head>

<body>

<div class="website">

@include('layouts.navbar')


    <!-- ================= GALERI ================= -->

    <main class="galeri-page">

        <h1>GALERI KEGIATAN</h1>


        <section class="gallery-grid">

            @foreach ($galeri as $item)

                <article class="gallery-card">

                    <div class="gallery-image">

                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             alt="{{ $item->judul }}">

                    </div>


                    <div class="gallery-info">

                        <h2>
                            {{ $item->judul }}
                        </h2>

                        <p>
                            <i class="fa-regular fa-calendar-days"></i>
                            {{ $item->tanggal }}
                        </p>

                    </div>

                </article>

            @endforeach

        </section>

    </main>

    @include('layouts.footer')

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>
    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('show');
    }
</script>

</body>

</html>