<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari username di tabel tabel_user
        $user = User::where('username', $request->username)->first();

        // Cek username dan password
        if ($user && Hash::check($request->password, $user->password)) {

            // Hanya admin yang boleh masuk backend
            if ($user->role !== 'admin') {
                return back()
                    ->withInput($request->only('username'))
                    ->with('error', 'Akun ini bukan akun admin.');
            }

            // Simpan data login ke session
            session([
                'login' => true,
                'id_user' => $user->id_user,
                'nama' => $user->nama,
                'username' => $user->username,
                'role' => $user->role,
            ]);

            // Admin masuk ke dashboard backend
            return redirect()->route('backend.beranda');
        }

        // Jika username/password salah
        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        // Hapus semua data session saat logout
        $request->session()->flush();

        // Kembali ke halaman login
        return redirect()->route('login');
    }
}