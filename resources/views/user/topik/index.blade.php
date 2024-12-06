@extends('user.layouts.app')

@section('title', 'Daftar Topik')

@section('content')
    <!-- Title with gradient text and hover glow effect -->
    <h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600 dark:from-blue-400 dark:via-indigo-500 dark:to-purple-600 mb-10 text-center transform transition-all duration-500 hover:scale-105 hover:text-opacity-90 hover:brightness-110">
        Daftar Topik
    </h2>
    
    <!-- Grid container with responsive design and hover effects -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($topiks as $topik)
            <div class="relative bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105 group">
                
                <!-- Decorative gradient for card header -->
                <div class="absolute inset-x-0 top-0 h-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-t-xl transition-all duration-300 group-hover:from-blue-600 group-hover:to-indigo-600"></div>
                
                <!-- Topik Title -->
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4 transition-colors duration-300 group-hover:text-blue-500">
                    {{ $topik->judul_topik }}
                </h3>
                
                <!-- Topik Description -->
                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ $topik->deskripsi_topik }}
                </p>

                <!-- Progress Bar -->
                @if ($topik->materis->count() > 0)
                    @php
                        $completedMateri = $topik->materis->filter(function($materi) {
                            return $materi->isCompleted(auth()->user());
                        })->count();

                        $progress = $topik->materis->count() > 0 ? round(($completedMateri / $topik->materis->count()) * 100) : 0;
                    @endphp

                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mb-4">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2.5 rounded-full transition-all duration-300 ease-in-out" style="width: {{ $progress }}%"></div>
                    </div>

                    <!-- Progres Bar Text Styling -->
                    <div class="flex items-center justify-between mb-4">
                        <!-- Percentage Completed -->
                        <div class="flex items-center">
                            <span class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $progress }}%</span>
                        </div>

                        <!-- Status Text with Dynamic Color -->
                        <div>
                            <span class="text-xs font-medium 
                                @if ($progress == 100) 
                                    text-green-500 dark:text-green-400 
                                @elseif ($progress > 50)
                                    text-yellow-500 dark:text-yellow-400
                                @else
                                    text-red-500 dark:text-red-400
                                @endif
                            ">
                                @if ($progress == 100)
                                    Selesai
                                @elseif ($progress > 0)
                                    Terus Belajar!
                                @else
                                    Mulai Belajar
                                @endif
                            </span>
                        </div>
                    </div>
                @endif
                
                <!-- Call-to-action button -->
                <a href="{{ route('user.topik.show', $topik->id) }}" 
                   class="inline-block py-2 px-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium rounded-full shadow-md hover:bg-blue-600 hover:to-indigo-600 transition-all duration-300 transform hover:scale-105">
                    Lihat Materi
                </a>
                
                <!-- Icon or badge to enhance the card -->
                <div class="absolute top-4 right-4 text-blue-500 dark:text-indigo-400 group-hover:text-indigo-600 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8m-4 4h4m-2-8h4m-6 4H5m-3 0h2a1 1 0 001-1V6a1 1 0 011-1h5a1 1 0 011 1v1"/>
                    </svg>
                </div>
            </div>
        @endforeach
    </div>
@endsection
