@extends('layouts.user.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Judul Halaman -->
        <h2 class="text-4xl font-extrabold mb-8 text-center text-blue-600">
            Daftar Topik
        </h2>

        @if($topiks->isEmpty())
            <div class="text-center p-8 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg shadow-xl">
                <p class="text-gray-500 font-medium text-lg">Tidak ada topik yang tersedia saat ini.</p>
            </div>
        @else
            <!-- Grid Layout for Topik Cards -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($topiks as $topik)
                    <!-- Card untuk setiap Topik -->
                    <li class="bg-gradient-to-r from-blue-700 to-blue-400 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-transform transform hover:scale-105 duration-300">
                        <h3 class="font-bold text-xl text-white mb-2">{{ $topik->judul_topik }}</h3>
                        <p class="text-white mb-6">{{ $topik->deskripsi_topik }}</p>
                        <a href="{{ route('user.topik.show', $topik->id) }}" 
                           class="bg-white text-blue-600 font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-100 hover:shadow-lg transition-all duration-300">
                            Lihat Materi
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
