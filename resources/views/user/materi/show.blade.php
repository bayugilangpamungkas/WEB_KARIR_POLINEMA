@extends('user.layouts.app')

@section('title', $materi->nama_materi)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Title -->
    <div class="text-center mb-10">
        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-4">
            {{ $materi->nama_materi }}
        </h2>
        <p class="text-lg text-gray-500 dark:text-gray-300">
            {{ $materi->created_at->format('d M Y') }} | Terakhir diperbarui: {{ $materi->updated_at->format('d M Y') }}
        </p>
    </div>

    <!-- Main content section -->
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-8 space-y-8">
        <!-- Display Materi Description -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Deskripsi</h3>
            <p class="text-gray-700 dark:text-gray-300">{{ $materi->deskripsi_materi }}</p>
        </div>

        <!-- Display Judul Konten if it exists -->
        @if ($materi->judul_konten)
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Judul Konten</h3>
            <p class="text-gray-700 dark:text-gray-300">{{ $materi->judul_konten }}</p>
        </div>
        @endif

        <!-- Display YouTube Video as iframe if URL is present -->
        @if ($materi->url_konten)
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Video Konten</h3>
            <div class="relative w-full overflow-hidden rounded-lg shadow-md" style="padding-top: 56.25%;">
                <iframe
                    src="{{ str_replace('watch?v=', 'embed/', $materi->url_konten) }}"
                    class="absolute top-0 left-0 w-full h-full rounded-lg"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif

        <!-- Display content (if it's HTML formatted content) -->
        @if($materi->content)
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Konten Tambahan</h3>
            <div class="prose dark:prose-dark max-w-none">
                {!! $materi->content !!}
            </div>
        </div>
        @endif
    </div>

    <!-- Button to mark as completed, aligned to the right -->
    <div class="flex justify-end mt-6">
        <form action="{{ route('user.materi.complete', $materi->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="py-2 px-6 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full hover:bg-blue-600 focus:outline-none shadow-lg transition duration-300 transform hover:scale-105">
                Tandai Selesai
            </button>
        </form>
    </div>
</div>
@endsection