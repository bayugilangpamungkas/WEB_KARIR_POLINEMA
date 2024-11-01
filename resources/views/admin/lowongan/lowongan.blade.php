@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold text-center">Daftar Lowongan</h1>

        @if (session('success'))
            <div class="flex items-center justify-between p-4 mb-4 text-white bg-green-500 rounded" role="alert">
                <span>{{ session('success') }}</span>
                <button type="button" class="ml-4 text-white hover:text-gray-200"
                    onclick="this.parentElement.style.display='none'">
                    &times;
                </button>
            </div>
        @endif

        <div class="mb-3 text-right">
            <a href="{{ route('admin.lowongan.create') }}"
                class="px-4 py-2 text-white transition bg-blue-500 rounded hover:bg-blue-600">
                Tambah Lowongan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="text-white bg-gray-800">
                    <tr class="text-left">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Deskripsi</th>
                        <th class="px-6 py-3">Perusahaan</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lowongans as $lowongan)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $lowongan->id }}</td>
                            <td class="px-6 py-4">{{ $lowongan->title }}</td>
                            <td class="px-6 py-4">{{ Str::limit($lowongan->description, 50) }}</td>
                            <td class="px-6 py-4">{{ $lowongan->company }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}"
                                    class="px-3 py-1 text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-white transition bg-red-500 rounded hover:bg-red-600"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">Tidak ada lowongan tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
