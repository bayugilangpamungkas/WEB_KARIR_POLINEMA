@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">📝 Tambah Lowongan Baru</h1>

        <!-- Formulir untuk menambah lowongan baru -->
        <form action="{{ route('admin.lowongan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Upload Foto Lowongan -->
            <div class="mb-5">
                <label for="fotoLowongan" class="block text-gray-700 font-medium mb-2">Foto Lowongan <span class="text-red-500">*</span></label>
                <input type="file" name="fotoLowongan" id="fotoLowongan"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    required accept="image/*">
            </div>

            <!-- Judul Lowongan -->
            <div class="mb-5">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Lowongan <span class="text-red-500">*</span></label>
                <input type="text" name="judul" id="judul"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="Contoh: Web Developer" required>
            </div>

            <!-- Deskripsi Lowongan -->
            <div class="mb-5">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Lowongan <span class="text-red-500">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="Deskripsi pekerjaan" required></textarea>
            </div>

            <!-- Link Google Maps -->
            <div class="mb-5">
                <label for="googleMapsLink" class="block text-gray-700 font-medium mb-2">Link Google Maps</label>
                <input type="url" name="googleMapsLink" id="googleMapsLink"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="https://maps.google.com/...">
            </div>

            <!-- Posisi Pekerjaan -->
            <div class="mb-5">
                <label for="posisi" class="block text-gray-700 font-medium mb-2">Posisi <span class="text-red-500">*</span></label>
                <input type="text" name="posisi" id="posisi"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="Contoh: Full Stack Developer" required>
            </div>

            <!-- Nama Perusahaan -->
            <div class="mb-5">
                <label for="namaPerusahaan" class="block text-gray-700 font-medium mb-2">Nama Perusahaan <span class="text-red-500">*</span></label>
                <input type="text" name="namaPerusahaan" id="namaPerusahaan"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="Nama perusahaan" required>
            </div>

            <!-- Kontak -->
            <div class="mb-5">
                <label for="kontak" class="block text-gray-700 font-medium mb-2">Kontak</label>
                <input type="text" name="kontak" id="kontak"
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm"
                    placeholder="Nomor kontak atau email">
            </div>

            <!-- Tanggal Mulai dan Tanggal Selesai -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="tanggalMulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggalMulai" id="tanggalMulai"
                        class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm" required>
                </div>
                <div>
                    <label for="tanggalSelesai" class="block text-gray-700 font-medium mb-2">Tanggal Selesai <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggalSelesai" id="tanggalSelesai"
                        class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md p-3 shadow-sm" required>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between space-x-4">
                <a href="{{ route('admin.lowongan.index') }}"
                    class="w-1/2 text-center bg-gray-400 text-white py-3 rounded-lg shadow-md transition hover:bg-gray-500">
                    <i class="fas fa-arrow-left mr-2"></i>Batal
                </a>
                <button type="submit"
                    class="w-1/2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-lg shadow-md transition hover:from-blue-600 hover:to-indigo-700">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection