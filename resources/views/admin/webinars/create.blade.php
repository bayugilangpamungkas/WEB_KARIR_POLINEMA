<!-- resources/views/admin/webinars/create.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 tracking-wide mb-8">
        📝 Tambah Webinar Baru
    </h2>

    <form action="{{ route('admin.webinars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- Judul Webinar -->
        <div class="mb-4">
            <label for="judul_web" class="block text-lg font-medium">Judul Webinar</label>
            <input type="text" name="judul_web" id="judul_web" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <!-- Tanggal Webinar -->
        <div class="mb-4">
            <label for="tanggal_web" class="block text-lg font-medium">Tanggal Webinar</label>
            <input type="date" name="tanggal_web" id="tanggal_web" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <!-- Narasumber -->
        <div class="mb-4">
            <label for="narasumber" class="block text-lg font-medium">Narasumber</label>
            <input type="text" name="narasumber" id="narasumber" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <!-- Poster Webinar -->
        <div class="mb-4">
            <label for="poster_web" class="block text-lg font-medium">Poster Webinar</label>
            <input type="file" name="poster_web" id="poster_web" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>

        <!-- Link Webinar -->
        <div class="mb-4">
            <label for="link_web" class="block text-lg font-medium">Link Webinar</label>
            <input type="url" name="link_web" id="link_web" class="w-full p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition duration-300">
                Tambah Webinar
            </button>
        </div>
    </form>
</div>
@endsection