@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-2xl p-8 space-y-6">
        <!-- Page Header -->
        <h1 class="text-4xl font-extrabold text-center text-gray-800 tracking-wide">📝 Tambah Topik Baru</h1>
        <p class="text-center text-gray-500">Lengkapi form di bawah untuk menambahkan topik baru ke sistem</p>

        <!-- Form -->
        <form action="{{ route('admin.topik.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Judul Topik -->
            <div>
                <label for="judul_topik" class="block text-sm font-medium text-gray-700 mb-1">
                    Judul Topik <span class="text-red-500">*</span>
                </label>
                <input type="text" id="judul_topik" name="judul_topik"
                       class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                       placeholder="Masukkan judul topik..." required>
            </div>

            <!-- Deskripsi Topik -->
            <div>
                <label for="deskripsi_topik" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi Topik
                </label>
                <textarea id="deskripsi_topik" name="deskripsi_topik" rows="4"
                          class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                          placeholder="Masukkan deskripsi topik..."></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center space-x-4">
                <a href="{{ route('admin.topik.index') }}"
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
@endsection
