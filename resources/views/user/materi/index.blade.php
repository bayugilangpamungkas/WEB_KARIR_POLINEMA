@extends('user.layouts.app')

@section('title', 'Daftar Materi untuk Topik: ' . $topik->judul_topik)

@section('content')
    <!-- Title with modern gradient and shadow removed -->
    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 mb-8 text-center">
        Daftar Materi untuk Topik: {{ $topik->judul_topik }}
    </h2>
    
    <!-- Grid Layout for Materi Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($topik->materis as $materi)
            <div class="relative bg-white dark:bg-gray-800 bg-opacity-90 backdrop-blur-md p-6 rounded-xl transition-all duration-500 transform hover:scale-105 group overflow-hidden">
                
                <!-- Decorative Neon Border Effect -->
                <div class="absolute inset-0 h-full w-full rounded-xl border-2 border-transparent group-hover:border-blue-500 dark:group-hover:border-indigo-500 transition-colors duration-500"></div>

                <!-- Decorative Gradient Bar at the Top -->
                <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-t-xl"></div>

                <!-- Icon with glow effect -->
                <div class="absolute top-4 right-4 text-blue-500 dark:text-indigo-400 group-hover:text-indigo-600 transition-transform transform hover:rotate-45 hover:scale-125">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-4 4h4m-2-8h4m-6 4H5m-3 0h2a1 1 0 001-1V6a1 1 0 011-1h5a1 1 0 011 1v1"/>
                    </svg>
                </div>

                <!-- Judul Materi with hover animation -->
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4 transition-colors duration-300 group-hover:text-blue-500">
                    {{ $materi->nama_materi }}
                </h3>

                <!-- Deskripsi Materi -->
                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed group-hover:text-gray-400 transition-all duration-300">
                    {{ $materi->deskripsi_materi }}
                </p>

                <!-- Tautan ke Detail Materi with hover and ripple effect -->
                <a href="{{ route('user.materi.show', $materi->id) }}" 
                   class="relative inline-block py-2 px-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium rounded-full transition-all duration-300 transform hover:scale-110 overflow-hidden">
                    <span class="absolute inset-0 w-full h-full bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-500"></span>
                    Baca Materi
                </a>
            </div>
        @endforeach
    </div>
@endsection
