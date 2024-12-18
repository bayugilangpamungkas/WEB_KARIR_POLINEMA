@extends('admin.layouts.app')

@section('content')
<div class="flex-1 p-6">
    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <a href="{{ route('admin.manageuser.index') }}">
            <div class="bg-gradient-to-r from-primary to-secondary h-32 rounded-xl flex justify-center items-center shadow-2xl hover:shadow-xl transition duration-2000">
                <div class="text-center">
                    <i class="fas fa-user text-white text-2xl mb-2"></i>
                    <span class="block text-lg font-semibold text-white">Pengguna</span>
                    <span class="block text-sm text-white">{{ $totalPengguna }} Total</span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.lowongan.index') }}">
            <div class="bg-gradient-to-r from-primary to-secondary h-32 rounded-xl flex justify-center items-center shadow-2xl hover:shadow-xl transition duration-2000">
                <div class="text-center">
                    <i class="fas fa-briefcase text-white text-2xl mb-2"></i>
                    <span class="block text-lg font-semibold text-white">Lowongan</span>
                    <span class="block text-sm text-white">{{ $totalLowongan }} Total</span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.webinars.index')}}">
            <div class="bg-gradient-to-r from-primary to-secondary h-32 rounded-xl flex justify-center items-center shadow-2xl hover:shadow-xl transition duration-2000">
                <div class="text-center">
                    <i class="fas fa-video text-white text-2xl mb-2"></i>
                    <span class="block text-lg font-semibold text-white">Webinar</span>
                    <span class="block text-sm text-white">{{ $totalWebinar }} Total</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Progress Section -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-6 animate-fadeIn">
        <h2 class="text-xl font-semibold mb-4">Progress</h2>
        <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
            <div class="bg-primary h-4 rounded-full" style="width: 75%;"></div>
        </div>
        <span class="block text-sm text-gray-700">75% of monthly goals achieved</span>
    </div>

    <!-- Performance Section -->
    <div class="bg-white p-6 rounded-xl shadow-md animate-fadeIn">
        <h2 class="text-xl font-semibold mb-4">Performance</h2>
        <div class="relative w-full">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [120, 90, 80, 70, 100, 90],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                    },
                    title: {
                        display: true,
                        text: 'Revenue (in units)',
                        color: '#333',
                    },
                },
                x: {
                    grid: {
                        display: false,
                    },
                }
            }
        }
    });
</script>
@endsection