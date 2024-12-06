<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Vite for Tailwind CSS and JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-gray-100 via-gray-300 to-gray-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 text-gray-800 dark:text-gray-100 transition-all duration-300">
    <!-- Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- NavBar -->
        <nav class="bg-gradient-to-r from-blue-500 to-indigo-500 p-4 mb-6 rounded-lg shadow-md text-white flex items-center justify-between">
            <ul class="flex space-x-6">
                <li>
                    <a href="{{ route('user.lowongan.index') }}" class="hover:text-gray-200 transition duration-300">
                        Lowongan
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.topik.index') }}" class="hover:text-gray-200 transition duration-300">
                        Topik
                    </a>
                </li>
            </ul>
            <!-- Logout Button -->
            <div class="flex items-center space-x-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300 space-x-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <!-- Content Section with new gradient background -->
        <div class="bg-gradient-to-br from-white via-gray-100 to-blue-100 dark:from-gray-800 dark:via-gray-700 dark:to-indigo-800 p-8 rounded-lg shadow-lg transition-all duration-300">
            @yield('content')
        </div>
    </div>
</body>
</html>
