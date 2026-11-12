<?php

namespace App\Http\Controllers;

use App\Models\Organigram;
use Illuminate\Http\Request;

class OrganigramController extends Controller
{
    public function index()
    {
        $organigram = Organigram::all();

        return view('backend.organigram', compact('organigram'));
    }

    public function frontend()
{
    $organigram = Organigram::all();

    return view('organigram', compact('organigram'));
}
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaGambar = $request->file('gambar')->store('organigram', 'public');

        Organigram::create([
            'nama' => $request->nama,
            'gambar' => $namaGambar,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil ditambahkan.');
    }

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
            $namaGambar = $request->file('gambar')->store('organigram', 'public');
            $data['gambar'] = $namaGambar;
        }

        $organigram->update($data);

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil diperbarui.');
    }

    public function destroy($id_organigram)
    {
        $organigram = Organigram::findOrFail($id_organigram);

        $organigram->delete();

        return redirect()
            ->route('backend.organigram')
            ->with('success', 'Data organigram berhasil dihapus.');
    }
}