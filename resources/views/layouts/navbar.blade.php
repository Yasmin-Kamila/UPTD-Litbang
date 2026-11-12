<link rel="stylesheet" href="{{ asset('css/layouts/navbar.css') }}">

    <header class="navbar">

        <div class="brand">

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="brand-name">
                <strong>UPTD LITBANG</strong>
                <span>PLERED PURWAKARTA</span>
            </div>

        </div>

        <nav class="menu" id="menu">

            <a href="{{ route('beranda') }}"
               class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                Beranda
            </a>

            <a href="{{ route('profil') }}"
               class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                Profil
            </a>

            <a href="{{ route('layanan') }}"
               class="{{ request()->routeIs('layanan') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="{{ route('galeri') }}"
               class="{{ request()->routeIs('galeri') ? 'active' : '' }}">
                Galeri
            </a>

            <a href="{{ route('artikel') }}"
               class="{{ request()->routeIs('artikel') ? 'active' : '' }}">
                Artikel
            </a>

            <a href="{{ route('organigram') }}"
               class="{{ request()->routeIs('organigram') ? 'active' : '' }}">
                Organigram
            </a>

        </nav>

        <button class="menu-toggle"
                type="button"
                onclick="toggleMenu()">
            <i class="fa-solid fa-bars"></i>
        </button>

    </header>

<script>
function toggleMenu() {
    const menu = document.getElementById("menu");
    menu.classList.toggle("show");
}
</script>