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
    <!-- Register-->
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12 ">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img src="{{ asset('/asset/images/image3.png') }}" alt="Deskripsi Gambar"
                    class="w-[400px] h-[300px] object-cover rounded-lg mt-44 ml-32" />
            </aside>

            <main
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                        Register Your Account 🦑
                    </h1>

                    <p class="mt-4 leading-relaxed text-gray-500">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-gray-700 underline">Sign in</a>
                    </p>

                    <form method="POST" action="{{ route('register') }}" class="mt-8 grid grid-cols-6 gap-6">
                        @csrf

                        <!-- Full Name -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="FullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="FullName" name="name" value="{{ old('name') }}"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                required autofocus />
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIM -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="NIM" class="block text-sm font-medium text-gray-700">NIM</label>
                            <input type="text" id="NIM" name="nim" value="{{ old('nim') }}"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                required />
                            @error('nim')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-span-6">
                            <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="Email" name="email" value="{{ old('email') }}"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                required />
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="Password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="Password" name="password"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                required />
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="col-span-6 sm:col-span-3">
                            <label for="PasswordConfirmation"
                                class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                            <input type="password" id="PasswordConfirmation" name="password_confirmation"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                required />
                            @error('password_confirmation')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Marketing -->
                        <div class="col-span-6">
                            <label for="MarketingAccept" class="flex gap-4">
                                <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                                    class="size-5 rounded-md border-gray-200 bg-white shadow-sm" />

                                <span class="text-sm text-gray-700">
                                    I want to receive emails about events, product updates and company announcements.
                                </span>
                            </label>
                        </div>

                        <!-- Terms -->
                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                By creating an account, you agree to our
                                <a href="#" class="text-gray-700 underline">terms and conditions</a> and
                                <a href="#" class="text-gray-700 underline">privacy policy</a>.
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button
                                class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                Create an account
                            </button>
                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-gray-700 underline">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>

</html>
