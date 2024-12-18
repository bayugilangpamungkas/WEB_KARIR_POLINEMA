<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="min-h-screen">
    <section class="flex min-h-screen w-full">
        <div class="bg-white h-auto lg:h-auto lg:flex lg:flex-wrap">
            <!-- Left container -->
            <div class="px-4 md:px-0 lg:w-6/12 flex items-center justify-center">
                <div class="md:mx-6 md:p-8">
                    <!-- Logo -->
                    <div class="text-left">
                        <img class="mx-auto md:w-28 w-full h-auto" src="{{ asset('/asset/images/logo-polinema.webp') }}"
                            alt="polinema">
                        <h4 class="mt-4 text-xl font-semibold">Sign In</h4>
                        <p class="mt-1 mb-5 text-gray-500">Please login to your account</p>
                    </div>

                    <!-- Login failed message -->
                    @if ($errors->has('email'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-3">
                        <p>{{ $errors->first('email') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="relative mb-4">
                            <span class="absolute left-2 top-2.5 text-gray-500">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="text"
                                class="border p-2 pl-8 w-full rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
                                id="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-4">
                            <span class="absolute left-2 top-2.5 text-gray-500">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password"
                                class="border p-2 pl-8 w-full rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
                                id="password" name="password" placeholder="Password" required />

                            <button type="button"
                                class="absolute right-2 top-2.5 text-gray-500"
                                id="togglePassword">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>

                        <!-- Submit button -->
                        <div class="mb-5 text-center">
                            <button type="submit"
                                class="mb-3 w-full rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md bg-gradient-to-r from-violet-600 to-indigo-600">
                                Log in
                            </button>
                        </div>

                        <!-- Register button -->
                        <div class="flex items-center justify-between pb-1">
                            <p class="mb-0 me-2">Don't have an account?</p>
                            <a href="/register">
                                <button type="button" class="rounded border-2 px-6 py-2 text-xs font-medium uppercase leading-normal border-violet-400 hover:bg-violet-200">
                                    Register
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right container -->
            <div class="hidden lg:flex items-center lg:w-6/12" style="background: #9ECAE1;">
                <div class="px-4 py-6 text-white md:p-12">
                    <h3 class="mb-10 text-2xl font-extrabold text-center" style="color: #1C3166;">
                        Sistem Informasi Karir JPC Polinema
                    </h3>
                    <div class="flex justify-center">
                        <img src="{{ asset('/asset/images/bg-login.png') }}" alt="image" class="w-3/4 h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>