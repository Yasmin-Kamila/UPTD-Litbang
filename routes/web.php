<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrganigramController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Middleware\AdminMiddleware;


/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'frontend'])->name('beranda');

Route::get('/profil', [ProfilController::class, 'frontend'])
    ->name('profil');

Route::get('/layanan', [LayananController::class, 'frontend'])
    ->name('layanan');

Route::get('/galeri', [GaleriController::class, 'frontend'])
    ->name('galeri');

Route::get('/artikel', [ArtikelController::class, 'frontend'])
    ->name('artikel');

Route::get('/organigram', [OrganigramController::class, 'frontend'])
    ->name('organigram');


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| BACKEND ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(AdminMiddleware::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | BERANDA
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/beranda', [BerandaController::class, 'index'])
        ->name('backend.beranda');


    /*
    |--------------------------------------------------------------------------
    | PROFIL
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/profil', [ProfilController::class, 'index'])
        ->name('backend.profil');

    Route::put('/backend/profil', [ProfilController::class, 'update'])
        ->name('backend.profil.update');


    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/galeri', [GaleriController::class, 'index'])
        ->name('backend.galeri');

    Route::post('/backend/galeri', [GaleriController::class, 'store'])
        ->name('backend.galeri.store');

    Route::put('/backend/galeri/{id_galeri}', [GaleriController::class, 'update'])
        ->name('backend.galeri.update');

    Route::delete('/backend/galeri/{id_galeri}', [GaleriController::class, 'destroy'])
        ->name('backend.galeri.destroy');


    /*
    |--------------------------------------------------------------------------
    | ARTIKEL
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/artikel', [ArtikelController::class, 'index'])
        ->name('backend.artikel');

    Route::post('/backend/artikel', [ArtikelController::class, 'store'])
        ->name('backend.artikel.store');

    Route::put('/backend/artikel/{id}', [ArtikelController::class, 'update'])
        ->name('backend.artikel.update');

    Route::delete('/backend/artikel/{id}', [ArtikelController::class, 'destroy'])
        ->name('backend.artikel.destroy');


    /*
    |--------------------------------------------------------------------------
    | LAYANAN
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/layanan', [LayananController::class, 'index'])
        ->name('backend.layanan');

    Route::post('/backend/layanan', [LayananController::class, 'store'])
        ->name('backend.layanan.store');

    Route::put('/backend/layanan/{id_layanan}', [LayananController::class, 'update'])
        ->name('backend.layanan.update');

    Route::delete('/backend/layanan/{id_layanan}', [LayananController::class, 'destroy'])
        ->name('backend.layanan.destroy');


    /*
    |--------------------------------------------------------------------------
    | ORGANIGRAM
    |--------------------------------------------------------------------------
    */

    Route::get('/backend/organigram', [OrganigramController::class, 'index'])
        ->name('backend.organigram');

    Route::post('/backend/organigram', [OrganigramController::class, 'store'])
        ->name('backend.organigram.store');

    Route::put('/backend/organigram/{id_organigram}', [OrganigramController::class, 'update'])
        ->name('backend.organigram.update');

    Route::delete('/backend/organigram/{id_organigram}', [OrganigramController::class, 'destroy'])
        ->name('backend.organigram.destroy');

});