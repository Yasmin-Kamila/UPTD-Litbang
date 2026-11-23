<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Menampilkan halaman user
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();

        return view('backend.user', compact('users'));
    }

    // Menambahkan user
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:tabel_user,username',
            'role' => 'required|in:admin,user',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('backend.user')
            ->with('success', 'User berhasil ditambahkan.');
    }

    // Mengubah user
    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $request->validate([
            'nama' => 'required',
            'username' => [
                'required',
                Rule::unique('tabel_user', 'username')
                    ->ignore($id_user, 'id_user'),
            ],
            'role' => 'required|in:admin,user',
            'password' => 'nullable|min:6',
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->role = $request->role;

        // Kalau password diisi, password akan diganti
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('backend.user')
            ->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->delete();

        return redirect()
            ->route('backend.user')
            ->with('success', 'User berhasil dihapus.');
    }
}