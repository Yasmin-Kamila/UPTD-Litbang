<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



<!--README webuptdlitbang-->
# Dokumentasi Website UPTD Litbang Keramik

# Website UPTD Litbang Keramik Plered Purwakarta

Website informasi resmi UPTD Litbang Keramik Plered Purwakarta yang digunakan untuk menyampaikan informasi mengenai profil, layanan, artikel, galeri, dan struktur organisasi. Website ini dirancang untuk mempermudah masyarakat dalam mengakses informasi terkait kegiatan, layanan, dan pengembangan teknologi keramik.

## Deskripsi

Website ini dibuat untuk:

- Menampilkan profil dan informasi UPTD Litbang Keramik
- Menyediakan informasi mengenai layanan yang tersedia
- Menampilkan galeri kegiatan dan dokumentasi
- Mempublikasikan artikel dan informasi terbaru
- Menampilkan struktur organisasi melalui halaman organigram
- Membantu administrator dalam mengelola data website secara terstruktur

## Fitur Utama

- Halaman beranda
- Halaman profil
- Halaman layanan
- Halaman galeri
- Halaman artikel
- Halaman detail artikel
- Halaman organigram
- Dashboard admin
- Pengelolaan data profil
- Pengelolaan data layanan
- Pengelolaan data galeri
- Pengelolaan data artikel
- Pengelolaan data organigram
- Form tambah, edit, dan hapus data
- Notifikasi sukses dan error
- Tampilan responsif untuk desktop dan perangkat mobile

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL
- HTML5
- CSS3
- JavaScript
- Blade Template Engine
- Font Awesome
- Laragon sebagai lingkungan pengembangan lokal

## Persyaratan Sistem

Sebelum menjalankan project, pastikan perangkat sudah memiliki:

- PHP 8.1 atau versi yang sesuai dengan project
- Composer
- MySQL atau MariaDB
- Node.js dan NPM
- Laragon atau web server lokal lainnya
- Git

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/webuptdlitbang.git
cd webuptdlitbang
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Install Dependency Frontend

```bash
npm install
```

### 4. Membuat File Environment

Pada Windows, jalankan:

```bash
copy .env.example .env
```

### 5. Konfigurasi Database

Buka file `.env`, kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webuptdlitbang
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database `webuptdlitbang` sudah dibuat melalui MySQL atau phpMyAdmin.

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Menjalankan Migrasi Database

```bash
php artisan migrate
```

### 8. Membuat Storage Link

```bash
php artisan storage:link
```

### 9. Menjalankan Aplikasi

```bash
php artisan serve
```

Kemudian buka browser dan akses:

```text
http://localhost:8000
```

## Menjalankan dengan Laragon

Jika menggunakan Laragon, letakkan project di:

```text
C:\laragon\www\webuptdlitbang
```

Kemudian jalankan Laragon dan pastikan web server serta database sudah aktif.

Project dapat diakses melalui:

```text
http://webuptdlitbang.test
```

## Build Frontend

Untuk menjalankan proses development:

```bash
npm run dev
```

Untuk membuat build production:

```bash
npm run build
```

## Struktur Project

```text
webuptdlitbang/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── css/
│   ├── images/
│   └── js/
├── resources/
│   └── views/
├── routes/
├── storage/
├── tests/
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── README.md
└── vite.config.js
```

## Cara Penggunaan

### Halaman Publik

Pengunjung dapat mengakses halaman website untuk melihat:

- Beranda
- Profil
- Layanan
- Galeri
- Artikel
- Struktur organisasi

### Halaman Admin

Administrator dapat login ke halaman backend yang tersedia pada aplikasi.

Admin dapat melakukan:

- Mengelola data profil
- Mengelola layanan
- Mengelola galeri
- Mengelola artikel
- Mengelola data organigram
- Menambah data
- Mengubah data
- Menghapus data

## Pengelolaan Gambar

Website menggunakan penyimpanan file untuk gambar yang digunakan pada galeri, artikel, dan organigram.

Pastikan storage Laravel sudah terhubung dengan menjalankan:

```bash
php artisan storage:link
```

Jika upload gambar tidak berjalan, periksa konfigurasi folder `storage` dan koneksi database.

## Database

Project menggunakan MySQL sebagai database.

Data yang digunakan dalam website meliputi:

- Data profil
- Data layanan
- Data galeri
- Data artikel
- Data organigram
- Data pengguna/admin

Struktur database dapat disesuaikan dengan kebutuhan aplikasi.

## Dokumentasi Screenshot

Screenshot halaman website dapat ditambahkan pada bagian ini untuk memberikan gambaran mengenai tampilan aplikasi.

Contoh halaman yang dapat didokumentasikan:

- Halaman beranda
- Halaman profil
- Halaman layanan
- Halaman galeri
- Halaman artikel
- Halaman organigram
- Dashboard admin

## Kontributor

Dikembangkan untuk kebutuhan website UPTD Litbang Keramik Plered Purwakarta.

## Lisensi

Project ini dibuat untuk kebutuhan internal UPTD Litbang Keramik Plered Purwakarta dan dapat dikembangkan sesuai dengan kebutuhan pengelola website.