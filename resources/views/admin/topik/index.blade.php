<!-- resources/views/admin/topik/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container p-8 mx-auto">
        <!-- Page Header Section -->
        <div class="flex flex-col items-center justify-between mb-8 space-y-4 sm:flex-row sm:space-y-0">
            <h2 class="text-3xl font-bold tracking-wide text-gray-800 sm:text-4xl">
                📋 Daftar Topik
            </h2>
            <a href="{{ route('admin.topik.create') }}"
                class="px-6 py-3 text-white transition duration-300 shadow-lg bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl">
                Tambah Topik Baru
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="p-4 mb-8 text-white bg-green-500 rounded-lg shadow-md animate-fadeIn">
                {{ session('success') }}
            </div>
        @endif

        <!-- Modern Table -->
        <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
            <table class="min-w-full border-collapse table-auto">
                <thead>
                    <tr
                        class="text-sm font-semibold tracking-wider text-gray-600 uppercase bg-gradient-to-r from-gray-100 to-gray-200">
                        <th class="px-6 py-4 text-left border-b">No</th>
                        <th class="px-6 py-4 text-left border-b">Judul Topik</th>
                        <th class="px-6 py-4 text-left border-b">Deskripsi</th>
                        <th class="px-6 py-4 text-center border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                    @foreach ($topiks as $topik)
                        <tr class="transition duration-300 hover:bg-indigo-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $topik->judul_topik }}</td>
                            <td class="px-6 py-4">{{ $topik->deskripsi_topik }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center space-x-4">
                                    <a href="{{ route('admin.topik.edit', $topik->id) }}"
                                        class="px-4 py-2 text-white transition duration-300 bg-yellow-400 rounded-lg shadow-md hover:bg-yellow-500">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button onclick="openDeleteModal({{ $topik->id }})"
                                        class="px-4 py-2 text-white transition duration-300 bg-red-500 rounded-lg shadow-md hover:bg-red-600">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
            <div class="p-8 space-y-6 bg-white shadow-xl rounded-xl">
                <h2 class="text-xl font-bold text-gray-800">Konfirmasi Penghapusan</h2>
                <p class="text-gray-600">Yakin ingin menghapus topik ini?</p>
                <div class="flex justify-end space-x-4">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 text-white transition bg-gray-400 rounded-lg hover:bg-gray-500">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Modal Handling -->
    <script>
        function openDeleteModal(topikId) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin/topik/${topikId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
