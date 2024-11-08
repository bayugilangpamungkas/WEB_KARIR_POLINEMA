<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
    // Menampilkan daftar pengguna dengan role 'user'
    public function index()
    {
        // Mengambil semua pengguna dengan role 'user'
        $users = User::where('role', 'user')->get();
        return view('admin.manageuser.index', compact('users'));
    }

    // Menampilkan form untuk menambah pengguna baru
    public function create()
    {
        return view('admin.manageuser.create');
    }

    // Menyimpan pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Role default == 'user'
        ]);

        return redirect()->route('admin.manageuser.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pengguna
    public function edit($id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();
        return view('admin.manageuser.edit', compact('user'));
    }

    // Memperbarui data pengguna di database
    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Memperbarui user tanpa password
        $user->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.manageuser.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna dari database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageuser.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
