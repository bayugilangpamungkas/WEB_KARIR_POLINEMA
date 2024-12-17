@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 rounded-lg shadow-xl">
        <h1 class="text-4xl font-extrabold text-white mb-6 text-center">Tambah Lowongan</h1>

        <form action="{{ route('admin.lowongan.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-6">
                <label for="title" class="block text-xl font-semibold text-gray-700 mb-2">Judul</label>
                <input type="text" name="title" id="title"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="block text-xl font-semibold text-gray-700 mb-2">Perusahaan</label>
                <input type="text" name="company" id="company"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ old('company') }}" required>
                @error('company')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="block text-xl font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tanggal_berakhir" class="block text-xl font-semibold text-gray-700 mb-2">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ old('tanggal_berakhir') }}" required>
                @error('tanggal_berakhir')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white font-semibold rounded-lg hover:bg-gradient-to-l focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                Simpan
            </button>
        </form>
    </div>
@endsection
