<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Floating animation for logo */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .logo {
            animation: float 4s ease-in-out infinite;
        }

        /* Sidebar transition */
        #sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(0);
            font-family: 'Poppins', sans-serif;
        }

        #sidebar.hidden {
            transform: translateX(-100%);
        }

        /* Rotate animation for icon */
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100 font-body">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 p-6 space-y-4 text-white shadow-lg bg-gradient-to-r from-blue-500 to-blue-800">
        <div class="flex items-center justify-center mb-8">
            <img src="/asset/images/logo_polinema.png" alt="Logo" class="w-20 h-20 rounded-full logo">
        </div>
        <hr class="border-t border-blue-300 opacity-50">
        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 transform bg-blue-700 rounded-lg shadow-sm hover:bg-blue-600 hover:scale-105">
                <i class="mr-2 text-blue-300 fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="#"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 transform bg-blue-700 rounded-lg shadow-sm hover:bg-blue-600 hover:scale-105">
                <i class="mr-2 text-green-300 fas fa-users"></i>
                <span>List Peserta</span>
            </a>
            <hr class="border-t border-blue-300 opacity-50">
            <button id="webinarToggle"
                class="flex items-center justify-between w-full px-4 py-2 font-medium text-white transition duration-200 transform bg-blue-700 rounded-lg shadow-sm hover:bg-blue-600 hover:scale-105">
                <div class="flex items-center">
                    <i class="mr-2 text-yellow-300 fas fa-graduation-cap"></i>
                    <span>Karir</span>
                </div>
                <i id="arrow" class="text-white transition-transform duration-300 fas fa-chevron-down"></i>
            </button>
            <div id="webinarDropdown" class="hidden pl-6 mt-2 space-y-2">
                <a href="{{ route('admin.topik.index') }}"
                    class="block px-4 py-2 font-medium text-white transition bg-blue-600 rounded-lg hover:bg-blue-500">
                    <i class="mr-2 text-purple-300 fas fa-book"></i> Topik
                </a>
                <a href="{{ route('admin.materi.index') }}"
                    class="block px-4 py-2 font-medium text-white transition bg-blue-600 rounded-lg hover:bg-blue-500">
                    <i class="mr-2 text-pink-300 fas fa-file-alt"></i> Materi
                </a>
            </div>
            <hr class="border-t border-blue-300 opacity-50">
            <a href="{{ route('admin.lowongan.index') }}"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 transform bg-blue-700 rounded-lg shadow-sm hover:bg-blue-600 hover:scale-105">
                <i class="mr-2 text-red-300 fas fa-briefcase"></i> Lowongan
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6 rounded-lg shadow-md bg-gradient-to-r from-blue-200 to-blue-300">
        <header
            class="flex items-center justify-between p-4 mb-6 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-blue-700">
            <button id="hamburger" class="text-white focus:outline-none">
                <i class="text-2xl fas fa-bars"></i>
            </button>
            <h1 class="text-2xl font-bold text-white">Selamat datang, Super Admin!</h1>
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <input type="text"
                        class="px-4 py-2 pl-10 text-sm bg-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Cari sesuatu...">
                    <i class="absolute text-gray-500 fas fa-search left-3 top-3"></i>
                </div>
                <div class="relative">
                    <i class="text-2xl text-white cursor-pointer fas fa-bell"></i>
                    <span
                        class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs text-white bg-red-600 rounded-full">3</span>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative">
                    <button class="flex items-center focus:outline-none" id="profileButton">
                        <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                        <span class="ml-2 font-medium text-white">Admin</span>
                        <i class="ml-2 text-white fas fa-chevron-down"></i>
                    </button>
                    <div class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg" id="profileDropdown">
                        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil Saya</a>
                        {{-- <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengaturan</a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Section -->
        @yield('content')

        <!-- Footer Section -->
        <footer class="p-4 mt-4 text-white bg-gradient-to-r from-blue-600 to-blue-800">
            <div class="container flex flex-col items-center justify-between mx-auto md:flex-row">
                <p class="text-sm text-center md:text-left">&copy; 2024 Your Company. All rights reserved.</p>
                <div class="mt-2 space-x-4 md:mt-0">
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Privacy Policy</a>
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Terms of
                        Service</a>
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Contact Us</a>
                </div>
                <div class="flex justify-center mt-4 space-x-4 md:mt-0">
                    <a href="https://www.facebook.com/polinema/?locale=id_ID"
                        class="text-blue-200 transition duration-200 hover:text-white"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/polinema_campus"
                        class="text-blue-400 transition duration-200 hover:text-white"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/polinema_campus/"
                        class="text-pink-500 transition duration-200 hover:text-white"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/school/polinema-joss/?originalSubdomain=id"
                        class="text-blue-300 transition duration-200 hover:text-white"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');
        const webinarToggle = document.getElementById('webinarToggle');
        const webinarDropdown = document.getElementById('webinarDropdown');
        const arrow = document.getElementById('arrow');
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        // Toggle sidebar
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        // Toggle webinar dropdown
        webinarToggle.addEventListener('click', () => {
            webinarDropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        });

        // Toggle profile dropdown
        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
