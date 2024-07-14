@extends('layout.masterAdminKeuangan')
@section('content')
    <div class="container">
        <div class="row">
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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold mx-auto text-primary">Grafik Kehadiran Pelatih</h6>
                    </div>
                    <div class="card-body">
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
            var kehadiranPelatih = @json($kehadiranPelatih);

            // Ambil nama-nama pelatih dari data yang ada
            var pelatihNames = kehadiranPelatih.map(function(item) {
                return item.nama_pelatih;
            });

            // Ambil total kehadiran dari data yang ada
            var kehadiranData = kehadiranPelatih.map(function(item) {
                return item.total_kehadiran;
            });

            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: pelatihNames,
                    datasets: [{
                        label: 'Kehadiran Pelatih',
                        data: kehadiranData,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
