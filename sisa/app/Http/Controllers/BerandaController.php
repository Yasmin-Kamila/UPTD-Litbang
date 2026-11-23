<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Artikel; 
use App\Models\Galeri; 
use App\Models\Layanan; 
use App\Models\User; 
 
class BerandaController extends Controller 
{ 
    public function index() 
    { 
        $jumlahArtikel = Artikel::count(); 
        $jumlahGaleri = Galeri::count(); 
        $jumlahLayanan = Layanan::count(); 
        $jumlahUser = User::count(); 
 
        return view('backend.beranda', compact( 
            'jumlahArtikel', 
            'jumlahGaleri', 
            'jumlahLayanan', 
            'jumlahUser' 
        )); 
    } 
 
    public function frontend() 
    { 
        $artikels = Artikel::orderBy('tanggal', 'desc') 
            ->limit(3) 
            ->get(); 
 
        $layanan = Layanan::orderBy('id_layanan', 'asc') 
            ->limit(4) 
            ->get(); 
 
        $galeri = Galeri::orderBy('id_galeri', 'desc') 
            ->limit(6) 
            ->get(); 
 
        return view('beranda', [ 
            'artikels' => $artikels, 
            'layanan' => $layanan, 
            'galeri' => $galeri 
        ]); 
    } 
}