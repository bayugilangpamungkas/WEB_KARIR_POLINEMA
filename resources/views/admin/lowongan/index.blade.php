@extends('admin.layouts.app')

@section('content')

<div class="container mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-extrabold text-blue-600 font-display">📋 Daftar Lowongan</h1>
        
        <a href="{{ route('admin.lowongan.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Tambah Lowongan
        </a>
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
                    <p class="flex items-center gap-2"><i class="fas fa-phone-alt text-teal-400"></i><span class="font-semibold text-gray-800">Kontak:</span> {{ $lowongan->kontak }}</p>
                    <p class="flex items-center gap-2"><i class="fas fa-calendar-alt text-purple-400"></i><span class="font-semibold text-gray-800">Tanggal:</span> {{ $lowongan->tanggal_mulai }} - {{ $lowongan->tanggal_selesai }}</p>
                    <a href="{{ $lowongan->google_maps_link }}" target="_blank" class="text-teal-600 font-medium hover:underline hover:text-teal-700 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt"></i> Lihat di Google Maps
                    </a>
                </div>

                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" class="text-teal-500 font-medium hover:underline hover:text-teal-400 transition flex items-center gap-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Delete button -->
                    <button onclick="showModal({{ $lowongan->id }})" class="text-red-500 font-medium hover:underline hover:text-red-400 transition flex items-center gap-2">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>

                    <!-- Hidden modal -->
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
                </div>
            </div>
        @endforeach
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
