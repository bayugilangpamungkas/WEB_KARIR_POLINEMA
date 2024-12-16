@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 space-y-4 sm:space-y-0">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 tracking-wide">
            📋 Daftar Webinar
        </h2>
        <a href="{{ route('admin.webinars.create') }}" 
           class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-xl 
                  shadow-lg transition duration-300">
            Tambah Webinar Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-8 shadow-md animate-fadeIn">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl shadow-lg bg-white">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 uppercase text-sm tracking-wider font-semibold">
                    <th class="py-4 px-6 border-b text-left">Judul</th>
                    <th class="py-4 px-6 border-b text-left">Tanggal</th>
                    <th class="py-4 px-6 border-b text-left">Narasumber</th>
                    <th class="py-4 px-6 border-b text-left">Link</th>
                    <th class="py-4 px-6 border-b text-left">Poster</th> <!-- New column -->
                    <th class="py-4 px-6 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 text-sm divide-y divide-gray-100">
                @foreach($webinars as $webinar)
                    <tr class="hover:bg-indigo-50 transition duration-300">
                        <td class="py-4 px-6">{{ $webinar->judul_web }}</td>
                        <td class="py-4 px-6">{{ $webinar->tanggal_web }}</td>
                        <td class="py-4 px-6">{{ $webinar->narasumber }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ $webinar->link_web }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                {{ $webinar->link_web }}
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
                        <td class="py-4 px-6 text-center">
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('admin.webinars.edit', $webinar->id) }}" 
                                   class="bg-yellow-400 text-white px-3 py-2 text-sm rounded-lg hover:bg-yellow-500 shadow-md transition duration-300">
                                    Edit
                                </a>
                                <button onclick="openModal({{ $webinar->id }})" 
                                        class="bg-red-500 text-white px-3 py-2 text-sm rounded-lg hover:bg-red-600 shadow-md transition duration-300">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="modal-delete" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold mb-4">Konfirmasi Penghapusan</h3>
        <p>Apakah Anda yakin ingin menghapus webinar ini?</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</button>
            <form id="delete-form" action="" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        // Set the action for delete form to the corresponding route
        document.getElementById('delete-form').action = '/admin/webinars/' + id + '/delete';

        // Show the modal
        document.getElementById('modal-delete').classList.remove('hidden');
    }

    function closeModal() {
        // Hide the modal
        document.getElementById('modal-delete').classList.add('hidden');
    }
</script>
@endsection
