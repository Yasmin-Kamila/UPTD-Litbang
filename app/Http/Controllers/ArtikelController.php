<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('tanggal', 'desc')->get();

        return view('backend.artikel', compact('artikel'));
    }

    public function frontend()
    {
        $artikel = Artikel::orderBy('tanggal', 'desc')->get();

        return view('artikel', compact('artikel'));
    }

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