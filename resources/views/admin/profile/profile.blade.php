@extends('layouts.app')

@section('content')
    <div class="container p-6 mx-auto">
        <!-- Page Title -->
        <div class="mb-6">
            <h4 class="text-2xl font-bold">Foto Profil</h4>
            <nav class="flex mt-2">
                <ol class="flex space-x-2 breadcrumb">
                    <li><a href="#" class="text-blue-500 hover:underline">Dashboard</a></li>
                    <li class="text-gray-500">Profile</li>
                </ol>
            </nav>
        </div>

        <div class="mb-4">
            @if (session('success'))
                <div class="px-4 py-2 text-green-800 bg-green-100 border-0 rounded-lg" id="alert" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6">
                <div class="flex flex-col items-center lg:flex-row">
                    <div class="text-center lg:w-1/3">
                        <div class="relative">
                            <img src="/{{ Auth::user()->foto_profile ? 'foto_profile/' . Auth::user()->foto_profile : 'dapuranita/default.jpg' }}"
                                alt="Profile Picture" class="border-4 border-blue-500 rounded-full w-28 h-28">
                            <span class="absolute bottom-0 right-0 p-1 bg-white rounded-full shadow-md">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <i class="text-blue-500 fas fa-camera"></i>
                                </a>
                            </span>
                        </div>
                        <h5 class="mt-3 text-xl font-semibold">{{ Str::title(Auth::user()->name) }}</h5>
                        <p class="text-gray-500">{{ Str::upper(Auth::user()->type) }}</p>
                    </div>

                    <div class="mt-4 lg:w-2/3 lg:pl-6 lg:mt-0">
                        <ul class="space-y-2">
                            <li class="flex items-center text-gray-700">
                                <i class="mr-2 text-blue-500 las la-phone"></i>
                                <span><strong>Telp:</strong> {{ Auth::user()->hp }}</span>
                            </li>
                            <li class="flex items-center text-gray-700">
                                <i class="mr-2 text-blue-500 las la-envelope"></i>
                                <span><strong>Email:</strong> {{ Auth::user()->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t">
                <div class="p-6">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="text-blue-500 nav-link active" data-bs-toggle="tab" href="#Settings"
                                role="tab">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="mt-4 tab-content">
                        <div class="tab-pane active" id="Settings" role="tabpanel">
                            <div class="grid grid-cols-1 gap-6">
                                <!-- Personal Information Form -->
                                @include('admin.profile.partials.personal-info-form')

                                <!-- Change Password Form -->
                                @include('admin.profile.partials.change-password-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Picture Upload Modal -->
        @include('admin.profile.partials.upload-profile-picture-modal')
    </div>
@endsection

@section('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files;
            if (file) {
                output1.src = URL.createObjectURL(file);
            }
        }
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
