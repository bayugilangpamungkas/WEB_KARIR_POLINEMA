<!-- resources/views/admin/materi/create.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-2xl p-8 space-y-8">
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-wider">📝 Tambah Materi Baru</h1>
            <p class="text-gray-500 mt-2">Isi form di bawah untuk menambahkan materi baru</p>
        </div>

        <!-- Form Section -->
        <form action="{{ route('admin.materi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Topik Selection -->
            <div>
                <label for="topik_id" class="block text-sm font-medium text-gray-700 mb-1">Topik <span class="text-red-500">*</span></label>
                <select name="topik_id" id="topik_id" 
                        class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
                    <option value="">Pilih Topik</option>
                    @foreach($topiks as $topik)
                        <option value="{{ $topik->id }}">{{ $topik->judul_topik }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Materi -->
            <div>
                <label for="nama_materi" class="block text-sm font-medium text-gray-700 mb-1">Nama Materi <span class="text-red-500">*</span></label>
                <input type="text" name="nama_materi" id="nama_materi" 
                       class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300" 
                       placeholder="Masukkan nama materi" required>
            </div>

            <!-- Deskripsi Materi -->
            <div>
                <label for="deskripsi_materi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Materi</label>
                <textarea name="deskripsi_materi" id="deskripsi_materi" rows="4" 
                          class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300" 
                          placeholder="Masukkan deskripsi materi..."></textarea>
            </div>

            <!-- Judul Konten -->
            <div>
                <label for="judul_konten" class="block text-sm font-medium text-gray-700 mb-1">Judul Konten</label>
                <input type="text" name="judul_konten" id="judul_konten" 
                       class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300" 
                       placeholder="Masukkan judul konten">
            </div>

            <!-- URL Konten -->
            <div>
                <label for="url_konten" class="block text-sm font-medium text-gray-700 mb-1">URL Konten</label>
                <input type="url" name="url_konten" id="url_konten" 
                       class="w-full border border-gray-300 rounded-xl p-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 transition duration-300" 
                       placeholder="Masukkan URL konten">
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between space-x-4">
                <a href="{{ route('admin.materi.index') }}" 
                   class="w-1/2 text-center bg-gray-400 text-white py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
                <button type="submit" 
                        class="w-1/2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-xl shadow-md transition">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
