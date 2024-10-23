<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                            <input type="email" id="email" name="email"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <input type="password" id="password" name="password"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                required>
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirm Password
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full p-2 mt-1 text-sm text-gray-700 bg-white border-2 border-blue-200 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                                required>
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

</html>
