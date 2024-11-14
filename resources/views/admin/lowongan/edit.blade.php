@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8 bg-gradient-to-r from-purple-600 via-blue-600 to-teal-500 rounded-lg shadow-xl">
        <h1 class="text-4xl font-extrabold text-white mb-6 text-center">Edit Lowongan</h1>

        <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST"
            class="bg-white p-8 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="judul" class="block text-xl font-semibold text-gray-700 mb-2">Judul</label>
                <input type="text" name="title" id="title"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ $lowongan->title }}" required>
            </div>

            <div class="mb-6">
                <label for="judul" class="block text-xl font-semibold text-gray-700 mb-2">Perusahaan</label>
                <input type="company" name="company" id="company"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ $lowongan->company }}" required>
            </div>


            <div class="mb-6">
                <label for="deskripsi" class="block text-xl font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    required>{{ $lowongan->description }}</textarea>
            </div>

            <div class="mb-6">
                <label for="tanggal_berakhir" class="block text-xl font-semibold text-gray-700 mb-2">Tanggal
                    Berakhir</label>
                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                    value="{{ $lowongan->tanggal_berakhir }}" required>
            </div>

            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white font-semibold rounded-lg hover:bg-gradient-to-l focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                Update
            </button>
        </form>
    </div>
@endsection
