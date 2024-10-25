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
            0%, 100% {
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

<body class="bg-gray-100 flex min-h-screen font-body">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-gradient-to-r from-blue-500 to-blue-800 text-white w-64 p-6 shadow-lg space-y-4">
        <div class="flex items-center justify-center mb-8">
            <img src="/asset/images/logo_polinema.png" alt="Logo" class="w-20 h-20 rounded-full logo">
        </div>

        <hr class="border-t border-blue-300 opacity-50">

        <nav class="space-y-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2 px-4 rounded-lg bg-blue-700 hover:bg-blue-600 text-white transition duration-200 ease-in-out transform hover:scale-105 shadow-sm font-medium">
                <i class="fas fa-home mr-2 text-blue-300"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-blue-700 hover:bg-blue-600 text-white transition duration-200 ease-in-out transform hover:scale-105 shadow-sm font-medium">
                <i class="fas fa-users mr-2 text-green-300"></i>
                <span>List Peserta</span>
            </a>
            <hr class="border-t border-blue-300 opacity-50">
            <div>
                <button id="webinarToggle" class="w-full flex items-center justify-between py-2 px-4 rounded-lg bg-blue-700 hover:bg-blue-600 text-white transition duration-200 ease-in-out transform hover:scale-105 shadow-sm font-medium">
                    <div class="flex items-center">
                        <i class="fas fa-graduation-cap mr-2 text-yellow-300"></i>
                        <span>Karir</span>
                    </div>
                    <i id="arrow" class="fas fa-chevron-down text-white transition-transform duration-300"></i>
                </button>
            </div>
            <div id="webinarDropdown" class="hidden pl-6 space-y-2 mt-2">
                <a href="{{ route('admin.topik.index') }}" class="block py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-500 text-white transition font-medium">
                    <i class="fas fa-book mr-2 text-purple-300"></i> Topik
                </a>
                <a href="{{ route('admin.materi.index') }}" class="block py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-500 text-white transition font-medium">
                    <i class="fas fa-file-alt mr-2 text-pink-300"></i> Materi
                </a>
            </div>
            <hr class="border-t border-blue-300 opacity-50">
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-blue-700 hover:bg-blue-600 text-white transition duration-200 ease-in-out transform hover:scale-105 shadow-sm font-medium">
                <i class="fas fa-briefcase mr-2 text-red-300"></i> Lowongan
            </a>
            <a href="#" class="flex items-center py-2 px-4 rounded-lg bg-blue-700 hover:bg-blue-600 text-white transition duration-200 ease-in-out transform hover:scale-105 shadow-sm font-medium">
                <i class="fas fa-question-circle mr-2 text-blue-300"></i> Ini apa isinya?
            </a>
        </nav>

        <hr class="border-t border-blue-300 opacity-50">
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6 bg-gradient-to-r from-blue-200 to-blue-300 rounded-lg shadow-md">        <!-- Modern Header -->
        <header class="flex justify-between items-center bg-gradient-to-r from-blue-500 to-blue-700 p-4 shadow-md rounded-lg mb-6">
            <!-- Hamburger Menu for Sidebar -->
            <button id="hamburger" class="text-white focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        
            <!-- Welcome Title -->
            <h1 class="text-2xl font-bold text-white">Selamat datang, Super Admin!</h1>
        
            <!-- Right Section: Search, Notifications, Profile -->
            <div class="flex items-center space-x-6">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text" class="bg-gray-200 rounded-full px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Cari sesuatu...">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                </div>
        
                <!-- Notification Icon -->
                <div class="relative">
                    <i class="fas fa-bell text-2xl text-white cursor-pointer"></i>
                    <!-- Notification Badge -->
                    <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                </div>
        
                <!-- Profile Dropdown -->
                <div class="relative">
                    <button class="flex items-center focus:outline-none">
                        <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                        <span class="ml-2 text-white font-medium">Admin</span>
                        <i class="fas fa-chevron-down ml-2 text-white"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content Section -->
        @yield('content')

<!-- Footer Section -->
<footer class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-4 mt-4">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <p class="text-center md:text-left text-sm">
            &copy; 2024 Your Company. All rights reserved.
        </p>
        <div class="space-x-4 mt-2 md:mt-0">
            <a href="#" class="text-white hover:text-blue-300 transition duration-200">Privacy Policy</a>
            <a href="#" class="text-white hover:text-blue-300 transition duration-200">Terms of Service</a>
            <a href="#" class="text-white hover:text-blue-300 transition duration-200">Contact Us</a>
        </div>
        <div class="space-x-4 mt-4 md:mt-0 flex justify-center">
            <!-- Facebook Icon -->
            <a href="https://www.facebook.com/polinema/?locale=id_ID" class="text-blue-200 hover:text-white transition duration-200">
                <i class="fab fa-facebook-f"></i>
            </a>
            <!-- Twitter Icon -->
            <a href="https://x.com/polinema_campus" class="text-blue-400 hover:text-white transition duration-200">
                <i class="fab fa-twitter"></i>
            </a>
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/polinema_campus/" class="text-pink-500 hover:text-white transition duration-200">
                <i class="fab fa-instagram"></i>
            </a>
            <!-- LinkedIn Icon -->
            <a href="https://www.linkedin.com/school/polinema-joss/?originalSubdomain=id" class="text-blue-300 hover:text-white transition duration-200">
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
    </script>
</body>

</html>
