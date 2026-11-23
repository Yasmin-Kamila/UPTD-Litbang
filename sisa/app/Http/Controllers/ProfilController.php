<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        $data = [
            'deskripsi' => '',
            'sejarah' => '',
            'visi' => '',
            'misi' => '',
        ];

        if ($profil && $profil->isi) {
            $isi = json_decode($profil->isi, true);

            if (is_array($isi)) {
                $data = array_merge($data, $isi);
            } else {
                $data['deskripsi'] = $profil->isi;
            }
        }

        return view('backend.profil', compact('profil', 'data'));
    }

    public function frontend()
{
    $profil = Profil::first();

    $data = [
        'deskripsi' => '',
        'sejarah' => '',
        'visi' => '',
        'misi' => '',
    ];

    if ($profil && $profil->isi) {
        $isi = json_decode($profil->isi, true);

        if (is_array($isi)) {
            $data = array_merge($data, $isi);
        } else {
            $data['deskripsi'] = $profil->isi;
        }
    }

    return view('profil', compact('profil', 'data'));
}
    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profil = Profil::first();

        if (!$profil) {
            $profil = new Profil();
        }

        $profil->judul = $request->judul;

        $profil->isi = json_encode([
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ], JSON_UNESCAPED_UNICODE);

        if ($request->hasFile('gambar')) {

            if ($profil->gambar) {
                Storage::disk('public')->delete($profil->gambar);
            }

            $profil->gambar = $request->file('gambar')
                ->store('profil', 'public');
        }

        $profil->save();

        return redirect()
            ->route('backend.profil')
            ->with('success', 'Profil berhasil disimpan.');
    }
}