<!-- resources/views/admin/topik/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <!-- Page Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 tracking-wide">
            📋 Daftar Topik
        </h2>
        <a href="{{ route('admin.topik.create') }}" 
           class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl 
                  shadow-lg transition duration-300">
            Tambah Topik Baru
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-8 shadow-md animate-fadeIn">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modern Table -->
    <div class="overflow-hidden rounded-2xl shadow-lg bg-white">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 uppercase text-sm tracking-wider font-semibold">
                    <th class="py-4 px-6 border-b text-left">No</th>
                    <th class="py-4 px-6 border-b text-left">Judul Topik</th>
                    <th class="py-4 px-6 border-b text-left">Deskripsi</th>
                    <th class="py-4 px-6 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm divide-y divide-gray-100">
                @foreach($topiks as $topik)
                    <tr class="hover:bg-indigo-50 transition duration-300">
                        <td class="py-4 px-6">{{ $loop->iteration }}</td>
                        <td class="py-4 px-6">{{ $topik->judul_topik }}</td>
                        <td class="py-4 px-6">{{ $topik->deskripsi_topik }}</td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('admin.topik.edit', $topik->id) }}" 
                                   class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500 
                                          shadow-md transition duration-300">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button onclick="openDeleteModal({{ $topik->id }})"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 
                                               shadow-md transition duration-300">
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
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-8 space-y-6 shadow-xl">
            <h2 class="text-xl font-bold text-gray-800">Konfirmasi Penghapusan</h2>
            <p class="text-gray-600">Yakin ingin menghapus topik ini?</p>
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
