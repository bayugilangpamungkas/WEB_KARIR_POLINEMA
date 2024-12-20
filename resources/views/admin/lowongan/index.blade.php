@extends('admin.layouts.app')

@section('content')

<div class="container mx-auto py-10 px-4">
    <!-- Title and Add Job Vacancy Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-extrabold font-display text-gray-800">📋 Daftar Lowongan</h1>
        <a href="{{ route('admin.lowongan.create') }}" class="bg-gradient-to-br from-purple-400 to-indigo-500 text-white font-bold py-3 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Tambah Lowongan
        </a>
    </div>

    <div class="border-b-2 border-gray-200 mb-8"></div>

    <!-- Table for Job Vacancies -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Foto</th>
                    <th class="py-3 px-6 text-left">Judul</th>
                    <th class="py-3 px-6 text-left">Posisi</th>
                    <th class="py-3 px-6 text-left">Perusahaan</th>
                    <th class="py-3 px-6 text-left">Tanggal</th>
                    <th class="py-3 px-6 text-left">Deskripsi</th>
                    <th class="py-3 px-6 text-left">Kontak</th>
                    <th class="py-3 px-6 text-left">Google Maps</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($lowonganList as $lowongan)
                <tr class="border-t hover:bg-gray-100">
                    <!-- Foto Column -->
                    <td class="py-4 px-6">
                        <img src="{{ $lowongan->foto_url }}" alt="{{ $lowongan->judul }}" class="w-16 h-16 object-cover rounded-lg">
                    </td>

                    <!-- Judul, Posisi, Perusahaan, Tanggal Columns -->
                    <td class="py-4 px-6">{{ $lowongan->judul }}</td>
                    <td class="py-4 px-6">{{ $lowongan->posisi }}</td>
                    <td class="py-4 px-6">{{ $lowongan->nama_perusahaan }}</td>
                    <td class="py-4 px-6">{{ $lowongan->tanggal_mulai }} - {{ $lowongan->tanggal_selesai }}</td>

                    <!-- Deskripsi Column -->
                    <td class="py-4 px-6">{{ Str::limit($lowongan->deskripsi, 50) }}</td>

                    <!-- Kontak Column -->
                    <td class="py-4 px-6">{{ $lowongan->kontak }}</td>

                    <!-- Google Maps Link Column -->
                    <td class="py-4 px-6">
                        <a href="{{ $lowongan->google_maps_link }}" target="_blank" class="text-teal-600 hover:text-teal-500 font-medium">
                            <i class="fas fa-map-marker-alt"></i> Lihat di Google Maps
                        </a>
                    </td>

                    <!-- Aksi Column -->
                    <td class="py-4 px-6 text-center">
                        <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="text-teal-500 hover:text-teal-400 transition inline-block mr-4">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button onclick="showModal({{ $lowongan->id }})" class="text-red-500 hover:text-red-400 transition inline-block">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </td>
                </tr>

                <!-- Modal for Delete Confirmation -->
                <div id="modal-{{ $lowongan->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-80">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h3>
                        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus lowongan ini?</p>
                        <div class="flex justify-end gap-4">
                            <button onclick="hideModal({{ $lowongan->id }})" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">
                                Batal
                            </button>
                            <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    function showModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }

    function hideModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
</script>

@endsection