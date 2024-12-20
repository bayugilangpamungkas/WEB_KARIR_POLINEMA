<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Import Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
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

        #sidebar {
            transition: transform 0.3s ease-in-out;
            transform: translateX(0);
            font-family: 'Poppins', sans-serif;
        }

        #sidebar.hidden {
            transform: translateX(-100%);
        }

        #hamburger {
            cursor: pointer;
            margin-right: 20px;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="flex min-h-screen bg-gray-100 font-body">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 p-6 space-y-4 text-white shadow-lg bg-gradient-to-tl from-slate-800 to-indigo-900">
        <div class="flex items-center justify-center mb-8">
            <img src="/asset/images/logo_polinema.png" alt="Logo" class="w-20 h-20 rounded-full logo">
        </div>

        <hr class="border-t border-blue-300 opacity-50">

        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 ease-in-out transform bg-blue-900 rounded-lg shadow-sm hover:bg-sky-700 hover:scale-105">
                <i class="mr-2 text-blue-300 fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.manageuser.index') }}"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 ease-in-out transform bg-blue-900 rounded-lg shadow-sm hover:bg-sky-700 hover:scale-105">
                <i class="mr-2 text-green-300 fas fa-users"></i>
                <span>List Peserta</span>
            </a>
            <hr class="border-t border-blue-300 opacity-50">
            <div>
                <button id="webinarToggle"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-white transition duration-200 ease-in-out transform bg-blue-900 rounded-lg shadow-sm hover:bg-sky-700 hover:scale-105">
                    <div class="flex items-center">
                        <i class="mr-2 text-yellow-300 fas fa-graduation-cap"></i>
                        <span>Karir</span>
                    </div>
                    <i id="arrow" class="text-white transition-transform duration-300 fas fa-chevron-down"></i>
                </button>
            </div>
            <div id="webinarDropdown" class="hidden pl-6 mt-2 space-y-2">
                <a href="{{ route('admin.topik.index') }}"
                    class="block px-4 py-2 font-medium text-white transition bg-blue-800 rounded-lg hover:bg-sky-600">
                    <i class="mr-2 text-purple-300 fas fa-book"></i> Topik
                </a>
                <a href="{{ route('admin.materi.index') }}"
                    class="block px-4 py-2 font-medium text-white transition bg-blue-800 rounded-lg hover:bg-sky-600">
                    <i class="mr-2 text-pink-300 fas fa-file-alt"></i> Materi
                </a>
            </div>
            <hr class="border-t border-blue-300 opacity-50">
            <a href="{{ route('admin.lowongan.index') }}"
                class="flex items-center px-4 py-2 font-medium text-white transition duration-200 ease-in-out transform bg-blue-900 rounded-lg shadow-sm hover:bg-sky-700 hover:scale-105">
                <i class="mr-2 text-red-300 fas fa-briefcase"></i> Lowongan
            </a>
            <a href="{{ route('admin.webinars.index') }}"
                class="flex items-center px-4 py-2 text-white bg-blue-900 rounded-lg hover:bg-sky-700">
                <i class="mr-2 text-yellow-300 fas fa-calendar-plus"></i> Webinar
            </a>
        </nav>

        <hr class="border-t border-blue-300 opacity-50">
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6 rounded-lg shadow-md bg-gradient-to-r from-blue-200 to-blue-300">
        <!-- Modern Header -->
        <header
            class="flex items-center justify-between p-4 mb-6 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-blue-700">
            <!-- Hamburger Menu for Sidebar -->
            <button id="hamburger" class="text-white focus:outline-none">
                <i class="text-2xl fas fa-bars"></i>
            </button>

            <!-- Welcome Title -->
            <h1 class="text-2xl font-bold text-white">Selamat datang, Super Admin!</h1>

            <!-- Right Section: Search, Notifications, Profile -->
            <div class="flex items-center space-x-6">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text"
                        class="px-4 py-2 pl-10 text-sm bg-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Cari sesuatu...">
                    <i class="absolute text-gray-500 fas fa-search left-3 top-3"></i>
                </div>

                <!-- Notification Icon -->
                <div class="relative">
                    <i class="text-2xl text-white cursor-pointer fas fa-bell"></i>
                    <!-- Notification Badge -->
                    <span
                        class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs text-white bg-red-600 rounded-full">3</span>
                </div>

                <!-- Profile Dropdown Section -->
                <div class="relative">
                    <button id="profileButton" class="flex items-center space-x-2 focus:outline-none">
                        <img src="https://via.placeholder.com/40" alt="User"
                            class="w-10 h-10 border-2 border-blue-500 rounded-full shadow-lg">
                        <div class="flex flex-col">
                            <span class="font-semibold text-white">{{ Auth::user()->name }}</span>
                            @if (Auth::user()->role == 'admin')
                                <span class="text-xs text-blue-200">Admin</span>
                            @elseif (Auth::user()->role == 'user')
                                <span class="text-xs text-blue-200">User</span>
                            @endif
                        </div>
                        <i class="ml-2 text-white transition-transform duration-300 transform fas fa-chevron-down"
                            :class="{ 'rotate-180': dropdownOpen }"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="absolute right-0 hidden w-56 py-4 mt-2 transition-all duration-300 ease-in-out transform scale-95 bg-white rounded-lg shadow-lg opacity-0"
                        x-show="dropdownOpen" @click.away="dropdownOpen = false">
                        <a href="#"
                            class="flex items-center block px-4 py-2 text-gray-800 transition duration-200 hover:bg-gray-100">
                            <i class="mr-2 text-green-500 fas fa-cog"></i> Settings
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit"
                                class="flex items-center block w-full px-4 py-2 text-left text-gray-800 transition duration-200 hover:bg-gray-100">
                                <i class="mr-2 text-red-500 fas fa-sign-out-alt"></i> Logout
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
                <p class="text-sm text-center md:text-left">
                    &copy; 2024 Your Company. All rights reserved.
                </p>
                <div class="mt-2 space-x-4 md:mt-0">
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Privacy Policy</a>
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Terms of
                        Service</a>
                    <a href="#" class="text-white transition duration-200 hover:text-blue-300">Contact Us</a>
                </div>
                <div class="flex justify-center mt-4 space-x-4 md:mt-0">
                    <!-- Social Media Links -->
                    <a href="https://www.facebook.com/polinema/?locale=id_ID"
                        class="text-blue-200 transition duration-200 hover:text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://x.com/polinema_campus"
                        class="text-blue-400 transition duration-200 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/polinema_campus/"
                        class="text-pink-500 transition duration-200 hover:text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/school/polinema-joss/?originalSubdomain=id"
                        class="text-blue-300 transition duration-200 hover:text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');
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
            arrow.classList.toggle('rotate-180');
        });

        profileButton.addEventListener('click', (event) => {
            event.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            profileDropdown.classList.toggle('opacity-0');
            profileDropdown.classList.toggle('scale-95');
        });

        document.addEventListener('click', () => {
            profileDropdown.classList.add('hidden');
            profileDropdown.classList.add('opacity-0');
            profileDropdown.classList.add('scale-95');
        });
    </script>
</body>

</html>
