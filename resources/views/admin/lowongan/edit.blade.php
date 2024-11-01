@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <h2 class="mb-6 text-2xl font-bold text-center">Edit Lowongan</h2>

        <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST"
            class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Judul Lowongan</label>
                <input type="text"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="title" name="title" value="{{ $lowongan->title }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2 text-sm font-bold text-gray-700">Deskripsi</label>
                <textarea
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="description" name="description" rows="4" required>{{ $lowongan->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="company" class="block mb-2 text-sm font-bold text-gray-700">Perusahaan</label>
                <input type="text"
                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="company" name="company" value="{{ $lowongan->company }}" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
