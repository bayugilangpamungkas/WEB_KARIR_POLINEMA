<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body class="bg-gray-100 flex min-h-screen font-body">
    {{-- <header class="bg-white shadow p-4">
        <h1 class="text-xl font-bold">User Panel</h1>
    </header> --}}

    <main class="flex-1 p-6">
        @yield('content')  <!-- Ini adalah tempat di mana konten akan ditampilkan -->
    </main>
</body>

</html>