@extends('layouts.user.layout')

@section('content')

    <h2 class="text-4xl font-bold mb-6 text-blue-600 text-center">
        {{ $materi->nama_materi }}
    </h2>

    <p class="text-lg text-blue-500 text-center mb-8">{{ $materi->deskripsi_materi }}</p>

    <h3 class="mt-6 text-2xl font-semibold text-blue-600">Konten Materi:</h3>

    <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 mt-4">
        @if (Str::contains($materi->url_konten, 'youtube.com') || Str::contains($materi->url_konten, 'youtu.be'))
            @php
                // Mengambil ID video dari URL
                $videoId = '';
                if (Str::contains($materi->url_konten, 'youtube.com')) {
                    parse_str(parse_url($materi->url_konten, PHP_URL_QUERY), $params);
                    $videoId = $params['v'] ?? '';
                } elseif (Str::contains($materi->url_konten, 'youtu.be')) {
                    $videoId = last(explode('/', $materi->url_konten));
                }
            @endphp
            <iframe class="rounded-md shadow-lg" 
                    src="https://www.youtube.com/embed/{{ $videoId }}" 
                    width="100%" height="500px" frameborder="0" allowfullscreen>
            </iframe>
        @else
            <iframe class="rounded-md shadow-lg" 
                    src="{{ $materi->url_konten }}" 
                    width="100%" height="500px" frameborder="0" allowfullscreen>
            </iframe>
        @endif
    </div>

@endsection
