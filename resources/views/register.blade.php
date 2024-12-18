<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Register Form -->

    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img src="{{ asset('/asset/images/image3.png') }}" alt="Deskripsi Gambar"
                    class="w-[400px] h-[300px] object-cover rounded-lg mt-44 ml-32" />
            </aside>

            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <h1 class="mt-6 text-2xl font-bold text-gray-900 mb-14 sm:text-3xl md:text-4xl">
                        Register Your Account
                    </h1>

                    <!-- Form Register -->
                    <form action="{{ route('register') }}" method="POST" class="grid grid-cols-6 gap-6 mt-8">
                        @csrf <!-- Token CSRF untuk keamanan -->

                        <!-- Nama Depan -->
                        <div class="relative col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full p-2 pl-10 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                value="{{ old('name') }}" required autofocus>
                            <span class="absolute text-gray-500 left-2 top-8">
                                <i class="fas fa-user"></i>
                            </span>
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div class="relative col-span-6 sm:col-span-3">
                            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                            <input type="text" id="nim" name="nim"
                                class="w-full p-2 pl-10 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                value="{{ old('nim') }}" required>
                            <span class="absolute text-gray-500 left-2 top-8">
                                <i class="fas fa-id-card"></i>
                            </span>
                            @error('nim')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="relative col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-2 pl-10 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                value="{{ old('email') }}" required>
                            <span class="absolute text-gray-500 left-2 top-8">
                                <i class="fas fa-envelope"></i>
                            </span>
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="relative col-span-6 sm:col-span-3">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                required>
                            <span id="togglePassword" class="absolute text-gray-500 cursor-pointer right-2 top-8">
                                <i class="fas fa-eye"></i>
                            </span>
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="relative col-span-6 sm:col-span-3">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                required>
                            <span id="togglePasswordConfirmation"
                                class="absolute text-gray-500 cursor-pointer right-2 top-8">
                                <i class="fas fa-eye"></i>
                            </span>
                            @error('password_confirmation')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit"
                                class="inline-block px-12 py-3 text-sm font-medium text-white transition border rounded-md shrink-0 border-violet-600 bg-violet-600 hover:bg-transparent hover:text-violet-600 focus:outline-none focus:ring active:text-violet-500">
                                Create an account
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Already have an account?
                                <a href="/login" class="text-gray-700 underline">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>


<script>
    // Toggle visibility for password
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Toggle visibility for confirm password
    document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
        const passwordField = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>

</html>
