
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>

    <link rel="stylesheet" href="{{ asset('css/organigram.css') }}">
</head>
<body>

<div class="website">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    <main class="content">

        <h1 class="page-title">STRUKTUR ORGANISASI</h1>

        <section class="organization">

            @if($organigram->count() > 0)

                {{-- BARIS 1: MUMUN --}}
                <div class="org-row org-row-one">

                    @foreach($organigram->slice(0, 1) as $item)

                        <div class="person-card">

                            <div class="person-photo">

                                @if($item->gambar)
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->nama }}"
                                    >
                                @else
                                    <div class="no-photo">Foto</div>
                                @endif

                            </div>

                            <div class="person-info">
                                <h3>{{ $item->nama }}</h3>
                                <p>{{ $item->jabatan }}</p>
                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- BARIS 2: JUJUN DAN AGUS --}}
                @if($organigram->count() > 1)

                    <div class="org-row org-row-two">

                        @foreach($organigram->slice(1, 2) as $item)

                            <div class="person-card">

                                <div class="person-photo">

                                    @if($item->gambar)
                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->nama }}"
                                        >
                                    @else
                                        <div class="no-photo">Foto</div>
                                    @endif

                                </div>

                                <div class="person-info">
                                    <h3>{{ $item->nama }}</h3>
                                    <p>{{ $item->jabatan }}</p>
                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- BARIS 3: BUNGA, RIDWAN, HARI, ACENG --}}
                @if($organigram->count() > 3)

                    <div class="org-row org-row-three">

                        @foreach($organigram->slice(3, 4) as $item)

                            <div class="person-card">

                                <div class="person-photo">

                                    @if($item->gambar)
                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->nama }}"
                                        >
                                    @else
                                        <div class="no-photo">Foto</div>
                                    @endif

                                </div>

                                <div class="person-info">
                                    <h3>{{ $item->nama }}</h3>
                                    <p>{{ $item->jabatan }}</p>
                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- BARIS 4: ATEP --}}
                @if($organigram->count() > 7)

                    <div class="org-row org-row-extra">

                        @foreach($organigram->slice(7, 1) as $item)

                            <div class="person-card">

                                <div class="person-photo">

                                    @if($item->gambar)
                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->nama }}"
                                        >
                                    @else
                                        <div class="no-photo">Foto</div>
                                    @endif

                                </div>

                                <div class="person-info">
                                    <h3>{{ $item->nama }}</h3>
                                    <p>{{ $item->jabatan }}</p>
                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            @else

                <p class="empty-message">
                    Data struktur organisasi belum tersedia.
                </p>

            @endif

        </section>

    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

</div>

</body>
</html>
