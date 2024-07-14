@extends('layout.masterBidangKemahasiswaan')
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
                    <h6 class="m-0 font-weight-bold mx-auto text-primary">Grafik Rata-rata Kehadiran Mahasiswa</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar pt-4 pb-2">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk menggambar grafik dengan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data yang diambil dari controller
            var rataRataKehadiran = @json($rataRataKehadiran);

            // Ambil nama-nama UKM dari data yang ada
            var ukmNames = rataRataKehadiran.map(function(item) {
                return item.nama_ukm;
            });

            // Ambil rata-rata kehadiran dari data yang ada
            var rataRataData = rataRataKehadiran.map(function(item) {
                return item.rata_rata_kehadiran;
            });

            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar', // Tipe grafik batang
                data: {
                    labels: ukmNames,
                    datasets: [{
                        label: 'Rata-rata Kehadiran Mahasiswa',
                        data: rataRataData,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)', // Warna latar belakang batang
                        borderColor: 'rgba(255, 99, 132, 1)', // Warna garis batang
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
