<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        // Mengambil semua pengguna dengan role 'user'
        $users = User::where('role', 'user')->get();
        return view('admin.manageuser.index', compact('users'));
    }

    public function create()
    {
        return view('admin.manageuser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:users,nim',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah ada dalam sistem.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah ada dalam sistem.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
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

    public function edit($id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();
        return view('admin.manageuser.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->where('role', 'user')->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:users,nim,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ], [
            'nim.unique' => 'NIM sudah ada dalam sistem.',
            'email.unique' => 'Email sudah ada dalam sistem.',
        ]);

        // Memperbarui user tanpa mengubah password
        $user->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.manageuser.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageuser.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
