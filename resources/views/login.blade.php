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

<body class="h-screen">
    <section class="h-full flex items-center justify-center">
        <div class="block bg-white shadow-lg h-full lg:h-auto lg:flex lg:flex-wrap">
            <!-- Left container -->
            <div class="px-4 md:px-0 lg:w-6/12 flex items-center justify-center">
                <div class="md:mx-6 md:p-8">
                    <!-- Logo -->
                    <div class="text-left">
                        <img class="mx-auto md:w-28 w-full h-auto" src="{{ asset('/asset/images/logo-polinema.webp') }}"
                            alt="polinema">
                        <h4 class="mt-6 pb-1 text-xl font-semibold">Sign In</h4>
                        <p class="mt-1 mb-7 text-gray-500">Please login to your account</p>
                    </div>

                    <form>
                        <!-- Email input -->
                        <div class="relative mb-4">
                            <span class="absolute left-2 top-2.5 text-gray-500">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="text"
                                class="border p-2 pl-8 w-full rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
                                id="email" placeholder="Email/NIM" required />
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-4">
                            <span class="absolute left-2 top-2.5 text-gray-500">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password"
                                class="border p-2 pl-8 w-full rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none"
                                id="password" placeholder="Password" required />
                        </div>

                        <!-- Submit button -->
                        <div class="mb-8 text-center">
                            <button
                                class="mb-3 w-full rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md bg-gradient-to-r from-violet-600 to-indigo-600">
                                Log in
                            </button>
                        </div>

                        <!-- Register button -->
                        <div class="flex items-center justify-between pb-4">
                            <p class="mb-0 me-2">Don't have an account?</p>
                            <a href="/register">
                                <button type="button" class="rounded border-2 px-6 py-2 text-xs font-medium uppercase leading-normal text-danger border-violet-400">
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
</body>

</html>