<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan semua data layanan
    public function index()
    {
        $layanan = Layanan::all();

        return view('backend.layanan', compact('layanan'));
    }

    public function frontend()
{
    $layanan = Layanan::all();

    return view('layanan', compact('layanan'));
}

    // Menambahkan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Layanan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('backend.layanan')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Mengubah data layanan
    public function update(Request $request, $id_layanan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $layanan = Layanan::findOrFail($id_layanan);

        $layanan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('backend.layanan')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    // Menghapus data layanan
    public function destroy($id_layanan)
    {
        $layanan = Layanan::findOrFail($id_layanan);

        $layanan->delete();

        return redirect()
            ->route('backend.layanan')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}