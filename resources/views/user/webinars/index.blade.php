@extends('user.layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold mb-6">📋 Daftar Webinar</h2>

    <div class="overflow-hidden rounded-lg shadow-lg bg-white">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm font-semibold">
                    <th class="py-4 px-6 text-left">Judul</th>
                    <th class="py-4 px-6 text-left">Tanggal</th>
                    <th class="py-4 px-6 text-left">Narasumber</th>
                    <th class="py-4 px-6 text-left">Link</th>
                    <th class="py-4 px-6 text-left">Poster</th> <!-- New column for Poster -->
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm divide-y divide-gray-100">
                @forelse($webinars as $webinar)
                    <tr class="hover:bg-gray-50 transition duration-300">
                        <td class="py-4 px-6">{{ $webinar->judul_web }}</td>
                        <td class="py-4 px-6">{{ $webinar->tanggal_web }}</td>
                        <td class="py-4 px-6">{{ $webinar->narasumber }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ $webinar->link_web }}" target="_blank" class="text-blue-500 hover:underline">
                                Lihat Detail
                            </a>
                        </td>
                        <td class="py-4 px-6">
                            <!-- Display poster image if available -->
                            @if($webinar->poster_web)
                                <img src="{{ asset('storage/' . $webinar->poster_web) }}" alt="Poster" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <span class="text-gray-500">Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada webinar tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
