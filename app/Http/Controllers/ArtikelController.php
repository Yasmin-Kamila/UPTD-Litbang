<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // ================= TAMPILKAN ARTIKEL ADMIN =================

    public function index()
    {
        $artikel = Artikel::orderBy('tanggal', 'desc')->get();

        return view('backend.artikel', compact('artikel'));
    }


    // ================= TAMPILKAN ARTIKEL FRONTEND =================

    public function frontend()
    {
        $artikel = Artikel::orderBy('tanggal', 'desc')->get();

        return view('artikel', compact('artikel'));
    }


    // ================= DETAIL ARTIKEL =================

    public function detail($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('detail-artikel', compact('artikel'));
    }


    // ================= TAMBAH ARTIKEL =================

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()
            ->route('backend.artikel')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }


    // ================= EDIT ARTIKEL =================

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {

            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()
            ->route('backend.artikel')
            ->with('success', 'Artikel berhasil diperbarui.');
    }


    // ================= HAPUS ARTIKEL =================

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('backend.artikel')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}