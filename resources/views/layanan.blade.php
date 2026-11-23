<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Layanan - UPTD Litbang Plered</title>

    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<div class="website">

    @include('layouts.navbar')

    <main class="content">

        <h1 class="page-title">LAYANAN KAMI</h1>

        <section class="layanan-list">

            @forelse ($layanan as $item)

                <div class="layanan-card">

                    <div class="card-icon">
                        @if ($loop->iteration == 1)
                            <i class="fa-solid fa-people-group"></i>
                        @elseif ($loop->iteration == 2)
                            <i class="fa-solid fa-award"></i>
                        @elseif ($loop->iteration == 3)
                            <i class="fa-solid fa-chalkboard-user"></i>
                        @elseif ($loop->iteration == 4)
                            <i class="fa-solid fa-bullhorn"></i>
                        @elseif ($loop->iteration == 5)
                            <i class="fa-solid fa-file-circle-check"></i>
                        @elseif ($loop->iteration == 6)
                            <i class="fa-solid fa-comments"></i>
                        @elseif ($loop->iteration == 7)
                            <i class="fa-solid fa-graduation-cap"></i>
                        @else
                            <i class="fa-solid fa-handshake"></i>
                        @endif
                    </div>

                    <h2>{{ $item->judul }}</h2>

                    <div class="dots">
                        {{ $item->deskripsi }}
                    </div>

                </div>

            @empty

                <div class="empty-layanan">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>Belum ada layanan yang tersedia.</p>
                </div>

            @endforelse

        </section>

    </main>

    @include('layouts.footer')

</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("show");
    }
</script>

</body>
</html>