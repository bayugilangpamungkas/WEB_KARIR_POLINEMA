@extends('user.layouts.app')

@section('content')

<div class="container mx-auto py-10 px-4">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-blue-600 font-display">💼 Lowongan Tersedia</h1>
        <p class="text-gray-600 text-sm mt-2">Temukan peluang karir yang sesuai dengan minat dan keahlian Anda.</p>
    </div>

    <div class="border-b-2 border-gray-200 mb-8"></div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($lowonganList as $lowongan)
            <div class="bg-gradient-to-br from-teal-50 to-purple-50 backdrop-blur-lg border border-gray-200 shadow-lg rounded-3xl p-6 hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 hover:scale-105 hover:border-teal-400">
                
                <img src="{{ $lowongan->foto_url }}" alt="{{ $lowongan->judul }}" class="w-full h-56 object-cover rounded-xl shadow-lg mb-5 transition duration-300 ease-in-out transform hover:scale-105">

                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2 font-display">{{ $lowongan->judul }}</h2>
                    <p class="text-gray-500 text-sm mb-5 font-body">{{ Str::limit($lowongan->deskripsi, 100) }}</p>
                </div>

                <div class="text-sm mb-5 font-body space-y-2">
                    <p class="flex items-center gap-2"><i class="fas fa-briefcase text-teal-500"></i><span class="font-semibold text-gray-800">Posisi:</span> {{ $lowongan->posisi }}</p>
                    <p class="flex items-center gap-2"><i class="fas fa-building text-purple-500"></i><span class="font-semibold text-gray-800">Perusahaan:</span> {{ $lowongan->nama_perusahaan }}</p>
                    <p class="flex items-center gap-2"><i class="fas fa-calendar-alt text-purple-400"></i><span class="font-semibold text-gray-800">Tanggal:</span> {{ $lowongan->tanggal_mulai }} - {{ $lowongan->tanggal_selesai }}</p>
                    <p class="flex items-center gap-2"><i class="fas fa-location-arrow text-orange-400"></i><span class="font-semibold text-gray-800">Lokasi:</span> {{ $lowongan->lokasi }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ $lowongan->google_maps_link }}" target="_blank" class="text-teal-600 font-medium hover:underline hover:text-teal-700 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt"></i> Lihat di Google Maps
                    </a>
                </div>

                <div class="mt-6">
                    <a href="{{ route('user.lowongan.show', $lowongan->id) }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-2">
                        <i class="fas fa-info-circle"></i> Detail Lowongan
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if ($lowonganList->isEmpty())
        <div class="text-center mt-10">
            <p class="text-gray-600 font-body text-lg">Saat ini belum ada lowongan tersedia. Silakan cek kembali nanti.</p>
        </div>
    @endif
</div>

@endsection
