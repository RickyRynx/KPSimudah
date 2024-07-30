@extends('layout.masterPembina')
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

        <div class="row">
            <!-- Grafik Kehadiran Anggota UKM -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Kehadiran Anggota UKM</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="kehadiranHarianChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Keaktifan UKM dan HMJ -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Keaktifan UKM dan HMJ</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="keaktifanBulananChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Data untuk Grafik Kehadiran Harian
                var ctxHarian = document.getElementById('kehadiranHarianChart').getContext('2d');
                var kehadiranHarianData = @json($kehadiranHarian);
                var labelsHarian = Object.keys(kehadiranHarianData);
                var dataHarian = Object.values(kehadiranHarianData);

                var kehadiranHarianChart = new Chart(ctxHarian, {
                    type: 'line',
                    data: {
                        labels: labelsHarian,
                        datasets: [{
                            label: 'Kehadiran Harian',
                            data: dataHarian,
                            backgroundColor: 'rgba(78, 115, 223, 0.05)',
                            borderColor: 'rgba(78, 115, 223, 1)',
                            pointRadius: 3,
                            pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                            pointBorderColor: 'rgba(78, 115, 223, 1)',
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                            pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                            pointHitRadius: 10,
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10
                                },
                                gridLines: {
                                    color: 'rgba(234, 236, 244, 1)',
                                    zeroLineColor: 'rgba(234, 236, 244, 1)',
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            backgroundColor: 'rgb(255,255,255)',
                            bodyFontColor: '#858796',
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10
                        }
                    }
                });

                // Data untuk Grafik Keaktifan Bulanan
                var ctxBulanan = document.getElementById('keaktifanBulananChart').getContext('2d');
                var keaktifanBulananData = @json($keaktifanBulanan);
                var labelsBulanan = Object.keys(keaktifanBulananData);
                var dataBulanan = Object.values(keaktifanBulananData);

                var keaktifanBulananChart = new Chart(ctxBulanan, {
                    type: 'bar',
                    data: {
                        labels: labelsBulanan,
                        datasets: [{
                            label: 'Keaktifan Bulanan',
                            data: dataBulanan,
                            backgroundColor: 'rgba(2, 117, 216, 0.75)',
                            borderColor: 'rgba(2, 117, 216, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 6
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    padding: 10
                                },
                                gridLines: {
                                    color: 'rgba(234, 236, 244, 1)',
                                    zeroLineColor: 'rgba(234, 236, 244, 1)',
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            backgroundColor: 'rgb(255,255,255)',
                            bodyFontColor: '#858796',
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
