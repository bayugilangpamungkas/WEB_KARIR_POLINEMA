<!-- resources/views/admin/webinars/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 tracking-wide mb-8">
        ✏️ Edit Webinar
    </h2>

    <form action="{{ route('admin.webinars.update', $webinar->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') <!-- Method PUT untuk update -->

        <!-- Judul Webinar -->
        <div>
            <label for="judul_web" class="text-lg font-medium">Judul Webinar</label>
            <input type="text" name="judul_web" id="judul_web" class="w-full p-4 rounded-lg border" value="{{ old('judul_web', $webinar->judul_web) }}" required>
        </div>

        <!-- Tanggal Webinar -->
        <div>
            <label for="tanggal_web" class="text-lg font-medium">Tanggal Webinar</label>
            <input type="date" name="tanggal_web" id="tanggal_web" class="w-full p-4 rounded-lg border" value="{{ old('tanggal_web', $webinar->tanggal_web) }}" required>
        </div>

        <!-- Narasumber -->
        <div>
            <label for="narasumber" class="text-lg font-medium">Narasumber</label>
            <input type="text" name="narasumber" id="narasumber" class="w-full p-4 rounded-lg border" value="{{ old('narasumber', $webinar->narasumber) }}" required>
        </div>

        <!-- Poster Webinar -->
        <div>
            <label for="poster_web" class="text-lg font-medium">Poster Webinar</label>
            <input type="file" name="poster_web" id="poster_web" class="w-full p-4 rounded-lg border">
            @if($webinar->poster_web)
            <p class="mt-2 text-sm text-gray-600">Poster saat ini:</p>
            <img src="{{ asset('storage/' . $webinar->poster_web) }}" alt="Poster Webinar" class="w-32 h-32 object-cover mt-2">
            @endif
        </div>

        <!-- Link Webinar -->
        <div>
            <label for="link_web" class="text-lg font-medium">Link Webinar</label>
            <input type="url" name="link_web" id="link_web" class="w-full p-4 rounded-lg border" value="{{ old('link_web', $webinar->link_web) }}" required>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.webinars.index') }}" class="text-gray-600 hover:text-gray-800">
                <button type="button" class="px-6 py-3 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">Kembali</button>
            </a>
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Perbarui Webinar</button>
        </div>
    </form>
</div>
@endsection