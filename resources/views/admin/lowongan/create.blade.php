@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-6 text-2xl font-bold">Tambah Lowongan</h1>

        <form action="{{ route('admin.lowongan.store') }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2 font-semibold text-gray-700">Judul</label>
                <input type="text" name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 font-semibold text-gray-700">Deskripsi</label>
                <textarea name="description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required></textarea>
            </div>
            <div class="mb-4">
                <label for="company" class="block mb-2 font-semibold text-gray-700">Perusahaan</label>
                <input type="text" name="company"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <button type="submit" class="px-4 py-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                Simpan Lowongan
            </button>
        </form>
    </div>
@endsection
