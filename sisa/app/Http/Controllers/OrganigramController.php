<?php

namespace App\Http\Controllers;

use App\Models\Organigram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganigramController extends Controller
{
    // Menampilkan data organigram di halaman admin
    public function index()
    {
        $organigram = Organigram::all();

        return view('backend.organigram', compact('organigram'));
    }

    // Menampilkan data organigram di halaman depan
    public function frontend()
    {
        $organigram = Organigram::all();

        return view('organigram', compact('organigram'));
    }

    // Menambahkan data organigram
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Menyimpan gambar ke storage/app/public/organigram
        $namaGambar = $request->file('gambar')->store('organigram', 'public');

        Organigram::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'gambar' => $namaGambar,
        ]);

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil ditambahkan.');
    }

    // Memperbarui data organigram
    public function update(Request $request, $id_organigram)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $organigram = Organigram::findOrFail($id_organigram);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ];

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama jika ada
            if ($organigram->gambar) {
                Storage::disk('public')->delete($organigram->gambar);
            }

            // Simpan gambar baru
            $namaGambar = $request->file('gambar')->store('organigram', 'public');

            $data['gambar'] = $namaGambar;
        }

        $organigram->update($data);

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil diperbarui.');
    }

    // Menghapus data organigram
    public function destroy($id_organigram)
    {
        $organigram = Organigram::findOrFail($id_organigram);

        // Hapus file gambar
        if ($organigram->gambar) {
            Storage::disk('public')->delete($organigram->gambar);
        }

        $organigram->delete();

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil dihapus.');
    }
}