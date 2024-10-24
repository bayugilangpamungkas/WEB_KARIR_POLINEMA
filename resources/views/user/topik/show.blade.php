@extends('layouts.user.layout')

@section('content')

    <h2 class="text-4xl font-bold mb-6 text-blue-600 text-center">
        {{ $topik->judul_topik }}
    </h2>

    <p class="text-lg text-blue-500 text-center mb-8">{{ $topik->deskripsi_topik }}</p>

    <h3 class="mt-6 text-2xl font-semibold text-blue-600">Materi:</h3>

    <ul class="space-y-4 mt-4">
        @foreach ($topik->materis as $materi)
            <li class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300">
                <h4 class="text-xl font-bold text-white mb-2">{{ $materi->nama_materi }}</h4>
                <p class="text-white mb-4">{{ $materi->deskripsi_materi }}</p>
                <a href="{{ route('user.materi.show', $materi->id) }}" 
                   class="bg-white text-blue-600 font-semibold px-4 py-2 rounded-md shadow hover:bg-blue-100 hover:shadow-lg transition-all duration-300">
                    Lihat Detail
                </a>
            </li>
        @endforeach
    </ul>

@endsection
