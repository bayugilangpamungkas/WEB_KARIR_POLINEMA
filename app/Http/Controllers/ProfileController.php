<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\AdminUser; // Pastikan model ini ada dan sesuai

class ProfileController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function index()
    {
        return view('admin.profile.profile');
    }

    // Memperbarui profil pengguna
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'type' => 'required|in:admin,superadmin',
        ]);

        // Ambil model pengguna yang sedang login
        $user = Auth::guard('admin')->user(); // Pastikan menggunakan guard yang tepat

        // Persiapkan data untuk update
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
        ];

        // Jika password diisi, hashing dan menambahkannya ke data
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Gunakan metode update() pada model
        $updated = AdminUser::where('id', $user->id)->update($data);

        if (!$updated) {
            return back()->withErrors(['update' => 'Gagal memperbarui profil.']);
        }

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Mengupload foto profil
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'foto_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Menghapus foto profil lama jika ada
        $user = Auth::guard('admin')->user();
        if ($user->foto_profile) {
            Storage::delete('foto_profile/' . $user->foto_profile);
        }

        // Menyimpan foto profil yang baru
        $filename = time() . '.' . $request->foto_profile->extension();
        $request->foto_profile->storeAs('foto_profile', $filename);

        // Update nama file foto profil di database
        $user->foto_profile = $filename;

        // Simpan perubahan ke database dengan metode update()
        $user->update(['foto_profile' => $filename]);

        return back()->with('success', 'Foto profil berhasil diunggah.');
    }

    // Mengganti password pengguna
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Pastikan password lama benar
        $user = Auth::guard('admin')->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);

        // Simpan perubahan ke database dengan metode update()
        $user->update(['password' => $user->password]);

        return back()->with('success', 'Password berhasil diubah');
    }
}
