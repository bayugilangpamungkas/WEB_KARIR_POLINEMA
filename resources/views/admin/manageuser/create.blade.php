@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-2xl p-8 space-y-6">
        <!-- Page Header -->
        <h1 class="text-4xl font-extrabold text-center text-gray-800 tracking-wide">📝 Tambah Pengguna Baru</h1>
        <p class="text-center text-gray-500">Lengkapi form di bawah untuk menambahkan pengguna baru ke sistem</p>

        <!-- Form -->
        <form action="{{ route('admin.manageuser.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name User-->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name"
                    class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                    placeholder="Masukkan nama lengkap pengguna..." value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIM -->
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">
                    NIM <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nim" name="nim"
                    class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                    placeholder="Masukkan NIM pengguna..." value="{{ old('nim') }}" required>
                @error('nim')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email User -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email"
                    class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                    placeholder="Masukkan email pengguna..." value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password User -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center relative">
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                        placeholder="Masukkan password pengguna..." required>
                    <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePasswordVisibility('password', 'passwordIcon')">
                        <i id="passwordIcon" class="fas fa-eye text-gray-500"></i>
                    </span>
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                    placeholder="Konfirmasi password pengguna..." required>
                <span class="absolute inset-y-0 right-4 flex items-center cursor-pointer" onclick="togglePasswordVisibility('password_confirmation', 'confirmPasswordIcon')">
                    <i id="confirmPasswordIcon" class="fas fa-eye text-gray-500 mt-5"></i>
                </span>
                @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center space-x-4">
                <a href="{{ route('admin.manageuser.index') }}"
                    class="w-full text-center bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-xl shadow-md transition-transform transform hover:scale-105">
                    Batal
                </a>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-700 text-white py-3 rounded-xl shadow-md transition-transform transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection