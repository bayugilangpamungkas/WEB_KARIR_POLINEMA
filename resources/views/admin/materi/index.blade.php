@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-4 sm:p-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
        <h2 class="text-3xl font-bold text-gray-800 tracking-wide">📚 Daftar Materi</h2>
        <a href="{{ route('admin.materi.create') }}"
            class="bg-gradient-to-br from-purple-400 to-indigo-500 text-sm font-semibold text-white px-6 py-3 rounded-xl shadow-lg transition duration-300 flex items-center gap-2">
            <i class="fas fa-plus"></i>Tambah Materi Baru
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md animate-fadeIn">
        {{ session('success') }}
    </div>
    @endif

    <!-- Responsive Table -->
    <div class="overflow-hidden rounded-2xl shadow-lg bg-white">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 uppercase text-sm font-semibold tracking-wider">
                <tr>
                    <th class="py-4 px-6 text-left">No</th>
                    <th class="py-4 px-6 text-left hidden md:table-cell">Nama Materi</th>
                    <th class="py-4 px-6 text-left hidden md:table-cell">Deskripsi</th>
                    <th class="py-4 px-6 text-left hidden md:table-cell">Judul Konten</th>
                    <th class="py-4 px-6 text-left">Konten</th>
                    <th class="py-4 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @foreach($materis as $materi)
                <tr class="hover:bg-indigo-50 transition duration-300">
                    <td class="py-4 px-6 text-center">{{ $loop->iteration }}</td>
                    <td class="py-4 px-6 hidden md:table-cell">{{ $materi->nama_materi }}</td>
                    <td class="py-4 px-6 hidden md:table-cell">{{ $materi->deskripsi_materi }}</td>
                    <td class="py-4 px-6 hidden md:table-cell">{{ $materi->judul_konten }}</td>
                    <td class="py-4 px-6">
                        @if (Str::contains($materi->url_konten, 'youtube.com') || Str::contains($materi->url_konten, 'youtu.be'))
                        @php
                        $videoId = Str::contains($materi->url_konten, 'youtu.be')
                        ? Str::after($materi->url_konten, 'youtu.be/')
                        : Str::afterLast($materi->url_konten, 'v=');
                        @endphp
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class="w-full h-full rounded-lg"
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        @else
                        <div class="aspect-w-16 aspect-h-9">
                            <video class="w-full h-full rounded-lg" controls>
                                <source src="{{ $materi->url_konten }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        </div>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('admin.materi.edit', $materi->id) }}"
                                class="text-yellow-500 hover:text-yellow-600 transition">
                                <i class="fas fa-edit text-xl"></i>
                            </a>
                            <button onclick="openDeleteModal({{ $materi->id }})"
                                class="text-red-500 hover:text-red-600 transition">
                                <i class="fas fa-trash-alt text-xl"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-8 space-y-6 shadow-xl">
            <h2 class="text-xl font-bold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="text-gray-600">Yakin ingin menghapus materi ini?</p>
            <div class="flex justify-end space-x-4">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                    Batal
                </button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Handling -->
<script>
    function openDeleteModal(materiId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/materi/${materiId}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection