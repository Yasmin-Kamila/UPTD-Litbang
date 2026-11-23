<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    // =========================
    // HALAMAN BACKEND GALERI
    // =========================
    public function index()
    {
        $galeri = DB::table('tabel_galeri')
            ->orderBy('id_galeri', 'desc')
            ->get();

        return view('backend.galeri', compact('galeri'));
    }

    // =========================
    // HALAMAN FRONTEND GALERI
    // =========================
    public function frontend()
    {
        $galeri = DB::table('tabel_galeri')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('galeri', compact('galeri'));
    }

    // =========================
    // TAMBAH GALERI
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);

        $namaGambar = $request->file('gambar')
            ->store('galeri', 'public');

        DB::table('tabel_galeri')->insert([
            'judul' => $request->judul,
            'gambar' => $namaGambar,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('backend.galeri')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    // =========================
    // UPDATE GALERI
    // =========================
    public function update(Request $request, $id_galeri)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {
            $namaGambar = $request->file('gambar')
                ->store('galeri', 'public');

            $data['gambar'] = $namaGambar;
        }

        DB::table('tabel_galeri')
            ->where('id_galeri', $id_galeri)
            ->update($data);

        return redirect()
            ->route('backend.galeri')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    // =========================
    // HAPUS GALERI
    // =========================
    public function destroy($id_galeri)
    {
        DB::table('tabel_galeri')
            ->where('id_galeri', $id_galeri)
            ->delete();

        return redirect()
            ->route('backend.galeri')
            ->with('success', 'Galeri berhasil dihapus.');
    }
}