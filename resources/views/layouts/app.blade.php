<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Menggunakan Vite untuk mengintegrasikan file CSS -->
    @vite('resources/css/app.css')

    <!-- Menggunakan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        /* Animasi logo yang bergerak naik turun */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Memberikan animasi pada logo */
        .logo {
            animation: float 4s ease-in-out infinite;
        }

        /* Efek transisi untuk sidebar */
        #sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(0);
        }

        /* Menyembunyikan sidebar ketika class .hidden ditambahkan */
        #sidebar.hidden {
            transform: translateX(-100%);
        }

        /* Gaya untuk tombol hamburger (sidebar toggle) */
        #hamburger {
            cursor: pointer;
            margin-right: 20px;
        }

        /* Gaya untuk dropdown arrow saat diputar 180 derajat */
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100 font-body">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 p-6 space-y-4 text-gray-800 bg-white shadow-lg">
        <!-- Logo dan animasi -->
        <div class="flex items-center justify-center mb-8">
            <img src="/asset/images/logo_polinema.png" alt="Logo" class="w-20 h-20 rounded-full logo">
        </div>

        <!-- Navigasi Sidebar -->
        <nav class="space-y-4">
            <!-- Tombol Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-2 text-gray-800 transition duration-200 ease-in-out transform bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105">
                <i class="mr-2 fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <!-- Tombol List Peserta -->
            <a href="#"
                class="flex items-center px-4 py-2 text-gray-800 transition duration-200 ease-in-out transform bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105">
                <i class="mr-2 fas fa-users"></i>
                <span>List Peserta</span>
            </a>

            <!-- Dropdown Webinar -->
            <div>
                <button id="webinarToggle"
                    class="flex items-center justify-between w-full px-4 py-2 text-gray-800 transition duration-200 ease-in-out transform bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105">
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-video"></i>
                        <span>Webinar</span>
                    </div>
                    <i id="arrow" class="transition-transform duration-300 fas fa-chevron-down"></i>
                </button>

                <!-- Konten Dropdown -->
                <div id="webinarDropdown" class="hidden pl-6 mt-2 space-y-2">
                    <a href="{{ route('admin.topik.index') }}"
                        class="block px-4 py-2 text-gray-800 transition bg-gray-100 rounded-lg hover:bg-gray-200">
                        <i class="mr-2 fas fa-book"></i> Topik
                    </a>
                    <a href="{{ route('admin.materi.index') }}"
                        class="block px-4 py-2 text-gray-800 transition bg-gray-100 rounded-lg hover:bg-gray-200">
                        <i class="mr-2 fas fa-file-alt"></i> Materi
                    </a>
                </div>
            </div>

            <!-- Tombol Lowongan -->
            <a href="#"
                class="flex items-center px-4 py-2 text-gray-800 transition duration-200 ease-in-out transform bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105">
                <i class="mr-2 fas fa-briefcase"></i>
                <span>Lowongan</span>
            </a>

            <!-- Tombol Info -->
            <a href="#"
                class="flex items-center px-4 py-2 text-gray-800 transition duration-200 ease-in-out transform bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105">
                <i class="mr-2 fas fa-question-circle"></i>
                <span>Ini apa isinya?</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <header class="flex items-center justify-between mb-6">
            <button id="hamburger" class="text-gray-800 focus:outline-none">
                <i class="text-2xl fas fa-bars"></i>
            </button>
            <h1 class="text-2xl font-bold text-primary">Selamat datang Super Admin!</h1>
        </header>

        <!-- Konten Dinamis -->
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

        // Toggle sidebar saat hamburger diklik
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Toggle dropdown untuk bagian Webinar
        webinarToggle.addEventListener('click', () => {
            webinarDropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180'); // Memutar ikon panah 180 derajat saat diklik
        });
    </script>
</body>

</html>
