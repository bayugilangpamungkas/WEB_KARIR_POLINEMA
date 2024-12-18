@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full bg-white rounded-2xl shadow-lg p-8 space-y-6">
        <!-- Page Header -->
        <h1 class="text-3xl font-extrabold text-center text-gray-800 tracking-wider">✏️ Edit User</h1>
        <p class="text-center text-gray-500">Perbarui informasi user di bawah ini.</p>

        <!-- Form Section -->
        <form action="{{ route('admin.manageuser.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama User -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama User <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none transition duration-300"
                    placeholder="Masukkan nama user" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIM User -->
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">
                    NIM <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nim" name="nim" value="{{ old('nim', $user->nim) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none transition duration-300"
                    placeholder="Masukkan NIM user" required>
                @error('nim')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email User -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 rounded-lg p-3 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none transition duration-300"
                    placeholder="Masukkan email user" required>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4 mt-8 gap-6">
                <!-- Cancel Button -->
                <a href="{{ route('admin.manageuser.index') }}"
                    class="w-1/6 text-center bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 flex justify-center items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <!-- Update Button -->
                <button type="submit"
                    class="w-1/6 bg-gradient-to-br from-purple-400 to-indigo-500 text-white py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 flex justify-center items-center gap-2">
                    <i class="fas fa-save"></i>
                    <span>Update</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection