<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Layanan - UPTD Litbang Plered</title>

    <link rel="stylesheet"
          href="{{ asset('css/layanan.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>


<body>

<div class="website">

@include('layouts.navbar')


    <!-- ================= KONTEN ================= -->

    <main class="content">

        <h1 class="page-title">
            LAYANAN KAMI
        </h1>


        <section class="layanan-list">


            <!-- ================= JIKA ADA DATA ================= -->

            @forelse ($layanan as $item)


                <div class="layanan-card">


                    <div class="card-icon">

                        @if ($loop->iteration == 1)

                            💼

                        @elseif ($loop->iteration == 2)

                            🚐

                        @elseif ($loop->iteration == 3)

                            ⚖️

                        @elseif ($loop->iteration == 4)

                            📢

                        @elseif ($loop->iteration == 5)

                            🤝

                        @else

                            💼

                        @endif

                    </div>


                    <h2>
                        {{ $item->judul }}
                    </h2>


                    <div class="dots">
                        {{ $item->deskripsi }}
                    </div>


                </div>


            <!-- ================= JIKA DATA KOSONG ================= -->

            @empty


                <div class="empty-layanan">

                    <i class="fa-solid fa-circle-info"></i>

                    <p>
                        Belum ada layanan yang tersedia.
                    </p>

                </div>


            @endforelse


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