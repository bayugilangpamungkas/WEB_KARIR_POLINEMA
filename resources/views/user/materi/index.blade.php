@extends('layouts.user.layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Judul Halaman -->
        <h2 class="text-3xl font-bold mb-6 text-darkText">Daftar Materi</h2>
        
        @if($materis->isEmpty())
            <div class="text-center p-6 bg-lightBackground rounded-lg shadow-lg">
                <p class="text-muted">Tidak ada materi yang tersedia saat ini.</p>
            </div>
        @else
            <!-- List Materi -->
            <ul class="space-y-4">
                @foreach ($materis as $materi)
                    <li class="bg-white p-6 rounded-xl shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl duration-300">
                        <h3 class="font-semibold text-primary text-xl mb-2">{{ $materi->nama_materi }}</h3>
                        <p class="text-muted mb-4">{{ $materi->deskripsi_materi }}</p>
                        <a href="{{ route('user.materi.show', $materi->id) }}" class="text-secondary hover:text-hoverSecondary font-semibold">Lihat Detail</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
