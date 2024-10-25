<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include Vite for Tailwind CSS and JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-gray-100 via-gray-300 to-gray-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 text-gray-800 dark:text-gray-100 transition-all duration-300">
    <!-- Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- NavBar -->
        <nav class="bg-gradient-to-r from-blue-500 to-indigo-500 p-4 mb-6 rounded-lg shadow-md text-white">
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('user.topik.index') }}" class="hover:text-gray-200 transition duration-300">
                        Topik
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content Section with new gradient background -->
        <div class="bg-gradient-to-br from-white via-gray-100 to-blue-100 dark:from-gray-800 dark:via-gray-700 dark:to-indigo-800 p-8 rounded-lg shadow-lg transition-all duration-300">
            @yield('content')
        </div>
    </div>
</body>
</html>
