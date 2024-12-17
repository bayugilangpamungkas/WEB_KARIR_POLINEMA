@extends('user.layouts.app')

@section('content')

<div class="container mx-auto py-16 px-6">
    <!-- Title Section -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-blue-600 dark:text-blue-400 leading-tight mb-4">
            {{ $lowongan->judul }}
        </h1>
        <p class="text-xl text-gray-700 dark:text-gray-300 mt-2">{{ $lowongan->nama_perusahaan }}</p>
    </div>

    <div class="border-b-2 border-gray-300 mb-8"></div>

    <!-- Job Details Section -->
    <div class="bg-gradient-to-r from-teal-100 via-purple-100 to-indigo-100 dark:from-gray-800 dark:via-gray-700 dark:to-indigo-800 rounded-lg shadow-xl p-8 space-y-6">
        <div class="text-gray-700 dark:text-gray-200">
            <!-- Posisi -->
            <p class="text-lg font-semibold flex items-center">
                <i class="fas fa-briefcase text-teal-600 mr-2"></i>
                <strong>Posisi:</strong> <span class="text-teal-600">{{ $lowongan->posisi }}</span>
            </p>

            <!-- Deskripsi -->
            <p class="text-lg font-semibold flex items-center">
                <i class="fas fa-align-left text-purple-600 mr-2"></i>
                <strong>Deskripsi:</strong> {{ $lowongan->deskripsi }}
            </p>

            <!-- Tanggal -->
            <p class="text-lg font-semibold flex items-center">
                <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                <strong>Tanggal:</strong> {{ $lowongan->tanggal_mulai }} - {{ $lowongan->tanggal_selesai }}
            </p>

            <!-- Kontak -->
            <p class="text-lg font-semibold flex items-center">
                <i class="fas fa-phone-alt text-teal-500 mr-2"></i>
                <strong>Kontak:</strong> {{ $lowongan->kontak }}
            </p>
        </div>

        <!-- Google Maps Link -->
        <div class="mt-6">
            <a href="{{ $lowongan->google_maps_link }}" target="_blank" class="inline-block text-teal-500 hover:text-teal-600 font-semibold transition duration-300 transform hover:scale-105 hover:underline flex items-center gap-2">
                <i class="fas fa-map-marker-alt"></i> Lihat Lokasi di Google Maps
            </a>
        </div>
    </div>

    <!-- Button to go back -->
    <div class="mt-12 text-center">
        <a href="{{ route('user.lowongan.index') }}" class="inline-block bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-indigo-600 transition duration-300 transform hover:scale-105 hover:shadow-2xl">
            Kembali ke Daftar Lowongan
        </a>
    </div>
</div>

@endsection
