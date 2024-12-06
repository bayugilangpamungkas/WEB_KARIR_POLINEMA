@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">📝 Tambah Lowongan Baru</h1>

        <!-- Formulir untuk menambah lowongan baru -->
        <form action="{{ route('lowongan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="fotoLowongan" class="block text-gray-700 font-medium mb-2">Foto Lowongan</label>
                <input type="file" name="fotoLowongan" id="fotoLowongan" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" required>
            </div>
            <div class="mb-5">
                <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Lowongan</label>
                <input type="text" name="judul" id="judul" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="Contoh: Web Developer" required>
            </div>
            <div class="mb-5">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi Lowongan</label>
                <textarea name="deskripsi" id="deskripsi" rows="5" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="Deskripsi pekerjaan" required></textarea>
            </div>
            <div class="mb-5">
                <label for="googleMapsLink" class="block text-gray-700 font-medium mb-2">Link Google Maps</label>
                <input type="url" name="googleMapsLink" id="googleMapsLink" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="https://maps.google.com/...">
            </div>
            <div class="mb-5">
                <label for="posisi" class="block text-gray-700 font-medium mb-2">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="Contoh: Full Stack Developer" required>
            </div>
            <div class="mb-5">
                <label for="namaPerusahaan" class="block text-gray-700 font-medium mb-2">Nama Perusahaan</label>
                <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="Nama perusahaan" required>
            </div>
            <div class="mb-5">
                <label for="kontak" class="block text-gray-700 font-medium mb-2">Kontak</label>
                <input type="text" name="kontak" id="kontak" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" placeholder="Nomor kontak atau email">
            </div>
            <div class="mb-5">
                <label for="tanggalMulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
                <input type="date" name="tanggalMulai" id="tanggalMulai" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" required>
            </div>
            <div class="mb-5">
                <label for="tanggalSelesai" class="block text-gray-700 font-medium mb-2">Tanggal Selesai</label>
                <input type="date" name="tanggalSelesai" id="tanggalSelesai" class="w-full border-gray-300 focus:ring-2 focus:ring-blue-400 rounded-md shadow-sm p-3" required>
            </div>
            
            <!-- Adjusted button margin and padding -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-lg shadow-lg py-3 mt-8 mb-4 font-semibold">Tambah Lowongan</button>
        </form>
    </div>
</div>
@endsection
