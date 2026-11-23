<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - UPTD Litbang Keramik</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/login.css') }}">

</head>


<body>

<div class="login-page">


    <!-- ================= LOGO ================= -->

    <div class="login-logo">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo UPTD Litbang Keramik">

    </div>


    <!-- ================= JUDUL ================= -->

    <h1>HALAMAN LOGIN</h1>

    <p class="login-subtitle">
        Login Admin UPTD Litbang Keramik
    </p>


    <!-- ================= LOGIN CONTAINER ================= -->

    <section class="login-container">

        <div class="login-form">


            <!-- ================= PESAN ERROR ================= -->

            @if(session('error'))

                <div class="alert">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    {{ session('error') }}

                </div>

            @endif


            @if($errors->any())

                <div class="alert">

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- ================= FORM LOGIN ================= -->

            <form
                action="{{ route('login.process') }}"
                method="POST"
                autocomplete="off">

                @csrf


                <!-- ================= NAMA ================= -->

                <div class="form-group">

                    <label for="nama">

                        <i class="fa-solid fa-user"></i>

                        Nama

                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama"
                        autocomplete="off"
                        required>

                </div>


                <!-- ================= USERNAME ================= -->

                <div class="form-group">

                    <label for="username">

                        <i class="fa-solid fa-user"></i>

                        Username

                    </label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        autocomplete="off"
                        required>

                    @error('username')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ================= PASSWORD ================= -->

                <div class="form-group">

                    <label for="password">

                        <i class="fa-solid fa-lock"></i>

                        Password

                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="new-password"
                        required>

                    @error('password')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                <!-- ================= INGAT SAYA ================= -->

                <div class="login-options">

                    <label class="remember">

                        <input
                            type="checkbox"
                            name="remember">

                        <span>
                            Ingat saya
                        </span>

                    </label>

                </div>


                <!-- ================= TOMBOL LOGIN ================= -->

                <button
                    type="submit"
                    class="btn-login">

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Masuk

                </button>


            </form>

        </div>

    </section>


    <!-- ================= KEMBALI KE WEBSITE ================= -->

    <a
        href="{{ route('beranda') }}"
        class="back-to-website">

        <i class="fa-solid fa-arrow-left"></i>

        Kembali ke Website

    </a>


</div>

</body>

</html>