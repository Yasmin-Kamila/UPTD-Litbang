<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Artikel</title>

    <link rel="stylesheet"
          href="{{ asset('css/artikel.css') }}">

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


            <!-- ================= DATA ARTIKEL ================= -->

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



                    <!-- JUDUL -->

                    <h2>

                        {{ $item->judul }}

                    </h2>



                    <!-- TANGGAL -->

                    <div class="tanggal">


                        @if ($item->tanggal)

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}

                        @endif


                    </div>



                    <!-- ISI ARTIKEL -->

                    <p class="artikel-isi">

                        {{ $item->isi }}

                    </p>

                </article>


            <!-- ================= JIKA KOSONG ================= -->

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

        const menu =
            document.getElementById("menu");

        menu.classList.toggle("show");

    }

</script>


</body>

</html>