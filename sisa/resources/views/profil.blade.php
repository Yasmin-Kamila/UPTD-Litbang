
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - UPTD Litbang Keramik</title>

    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    @include('layouts.navbar')

    <main class="content">

        <!-- ==================================
             PROFIL DAN FOTO
        =================================== -->

        <section class="profile-top">

            <!-- KIRI: TEKS PROFIL -->
            <div class="profile-text">

                <h1>PROFIL</h1>

                <h2>{{ $profil->judul ?? 'UPTD LITBANG KERAMIK' }}</h2>

                <!-- DESKRIPSI -->
                <div class="description">
                    {!! $data['deskripsi'] ?? '' !!}
                </div>

            </div>


            <!-- KANAN: FOTO PROFIL -->
            <div class="profile-image">

                @if($profil && $profil->gambar)

                    <img
                        src="{{ asset('storage/' . $profil->gambar) }}"
                        alt="{{ $profil->judul }}">

                @else

                    <img
                        src="{{ asset('img/gedung.jpg') }}"
                        alt="Gedung UPTD Litbang Keramik">

                @endif

            </div>

        </section>


        <!-- ==================================
             SEJARAH FULL WIDTH
        =================================== -->

        <section class="history">

            <h2>SEJARAH KERAMIK PLERED</h2>

            <div class="history-line"></div>

            <p>
                {!! nl2br(e($data['sejarah'] ?? '')) !!}
            </p>

        </section>


        <!-- ==================================
             VISI DAN MISI
        =================================== -->

        <section class="vision-mission">

            <h2>VISI &amp; MISI</h2>

            <div class="title-line"></div>

            <div class="vision-mission-content">

                <!-- VISI -->
                <div class="vision">

                    <h3>VISI:</h3>

                    <p>
                        {!! nl2br(e($data['visi'] ?? '')) !!}
                    </p>

                </div>


                <!-- MISI -->
                <div class="mission">

                    <h3>MISI:</h3>

                    <ol>

                        @foreach (preg_split('/\r\n|\r|\n/', $data['misi'] ?? '') as $misi)

                            @if(trim($misi) !== '')

                                <li>{{ $misi }}</li>

                            @endif

                        @endforeach

                    </ol>

                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    @include('layouts.footer')


    <!-- SCRIPT NAVBAR -->
    <script>

        function toggleMenu() {

            const menu = document.getElementById("menu");

            menu.classList.toggle("show");

        }

    </script>

</body>

</html>
