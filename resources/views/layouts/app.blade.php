<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },


        .logo {
            animation: float 4s ease-in-out infinite;
        }

        #sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(0);
        }

        #sidebar.hidden {
            transform: translateX(-100%);
        }

        #hamburger {
            cursor: pointer;
            margin-right: 20px;
        }

        /* Style for dropdown arrow */
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="bg-gray-100 flex min-h-screen font-body">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-white text-gray-800 w-64 p-6 shadow-lg space-y-4">
        <div class="flex items-center justify-center mb-8">
            <img src="/asset/images/logo_polinema.png" alt="Logo" class="w-20 h-20 rounded-full logo">
        </div>
        <nav class="space-y-4">
            <!-- Dashboard Button -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition duration-200 ease-in-out transform hover:scale-105 shadow-sm">
                <i class="fas fa-home mr-2"></i>
                <span>Dashboard</span>
            </a>

            <!-- List Peserta Button -->
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition duration-200 ease-in-out transform hover:scale-105 shadow-sm">
                <i class="fas fa-users mr-2"></i>
                <span>List Peserta</span>
            </a>

            <!-- Webinar Dropdown -->
            <div>
                <button id="webinarToggle" class="w-full flex items-center justify-between py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition duration-200 ease-in-out transform hover:scale-105 shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-video mr-2"></i>
                        <span>Webinar</span>
                    </div>
                    <i id="arrow" class="fas fa-chevron-down transition-transform duration-300"></i>
                </button>
                <!-- Dropdown Content -->
                <div id="webinarDropdown" class="hidden pl-6 space-y-2 mt-2">
                    <a href="{{ route('admin.topik.index') }}" class="block py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition">
                        <i class="fas fa-book mr-2"></i> Topik
                    </a>
                    <a href="{{ route('admin.materi.index') }}" class="block py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition">
                        <i class="fas fa-file-alt mr-2"></i> Materi
                    </a>
                </div>
            </div>

            <!-- Lowongan Button -->
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition duration-200 ease-in-out transform hover:scale-105 shadow-sm">
                <i class="fas fa-briefcase mr-2"></i>
                <span>Lowongan</span>
            </a>

            <!-- Info Button -->
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-800 transition duration-200 ease-in-out transform hover:scale-105 shadow-sm">
                <i class="fas fa-question-circle mr-2"></i>
                <span>Ini apa isinya?</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <header class="flex justify-between items-center mb-6">
            <button id="hamburger" class="text-gray-800 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <h1 class="text-2xl font-bold text-primary">Selamat datang Super Admin!</h1>
        </header>

        <!-- Content Section -->
        @yield('content')
    </div>

    <!-- Optional JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');
        const webinarToggle = document.getElementById('webinarToggle');
        const webinarDropdown = document.getElementById('webinarDropdown');
        const arrow = document.getElementById('arrow');

        // Toggle sidebar on hamburger click
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Toggle dropdown for Webinar section
        webinarToggle.addEventListener('click', () => {
            webinarDropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180'); // Rotate the arrow on click
        });
    </script>
</body>

</html>
