@extends('layout.masterBidangKemahasiswaan')
@section('title', 'Dashboard')
@section('content')

    <div class="container">

        <h1 id="welcome-message"></h1>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var welcomeMessage = document.getElementById('welcome-message');
                var hour = new Date().getHours();

                var greeting = '';

                if (hour >= 5 && hour < 12) {
                    greeting = 'Selamat Pagi';
                } else if (hour >= 12 && hour < 17) {
                    greeting = 'Selamat Siang';
                } else if (hour >= 17 && hour < 20) {
                    greeting = 'Selamat Sore';
                } else {
                    greeting = 'Selamat Malam';
                }

                welcomeMessage.textContent = greeting + ', {{ Auth::user()->name }}';
            });
        </script>

        <div class="col-xl-8 col-lg-7 mx-auto">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold mx-auto text-primary">Grafik Keaktifan UKM dan HMJ</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
