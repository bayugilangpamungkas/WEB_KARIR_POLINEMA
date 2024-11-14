@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Lowongan</h1>

        <a href="{{ route('admin.lowongan.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300">Tambah Lowongan</a>

        @if (session('success'))
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto mt-6 bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-600">No</th>
                        <th class="px-6 py-3 text-left text-gray-600">Judul</th>
                        <th class="px-6 py-3 text-left text-gray-600">Perusahaan</th>
                        <th class="px-6 py-3 text-left text-gray-600">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-gray-600">Tanggal Berakhir</th>
                        <th class="px-6 py-3 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $index => $lowongan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $lowongan->title }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $lowongan->company }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $lowongan->description }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $lowongan->tanggal_berakhir }}</td>
                            <td class="px-6 py-4 flex items-center">
                                <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-400 mr-2 transition duration-300">Edit</a>

                                <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-500 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
