<!-- resources/views/admin/peserta/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Peserta</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-body">

    <div class="container p-6 mx-auto">
        <h2 class="mb-4 text-2xl font-bold text-gray-700">List Peserta</h2>
        <div class="overflow-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Nama
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Nim
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Email
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Status
                        </th>
                        <th
                            class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase bg-gray-100 border-b-2 border-gray-200">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertas as $peserta)
                        <tr class="hover:bg-gray-100">
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $peserta->nama }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $peserta->email }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                @if ($peserta->status == 'Aktif')
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                        <span class="relative">{{ $peserta->status }}</span>
                                    </span>
                                @else
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-red-200 rounded-full opacity-50"></span>
                                        <span class="relative">{{ $peserta->status }}</span>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href="#" class="mr-2 text-blue-500 hover:text-blue-700">Lihat</a>
                                <a href="#" class="mr-2 text-yellow-500 hover:text-yellow-700">Edit</a>
                                <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
