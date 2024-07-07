@extends('layout.masterPelatih')
@section('content')
    <div class="container">

        <div>
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
        </div>

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/absensiPelatih">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Absensi</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">00/105</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/kegiatanPelatih">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Kegiatan/Lomba</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">00/105</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Perubahan Jadwal Latihan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body col-lg-5">
                        <form action="/submit-endpoint" method="post"
                            style="display: flex; flex-direction: column; width: 300px;">
                            <div
                                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                                <label for="nama" style="width: 100px;">Nama:</label>
                                <input type="text" id="nama" name="nama" style="flex: 1;">
                            </div>
                            <div
                                style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
                                <label for="email" style="width: 100px;">Email:</label>
                                <input type="email" id="email" name="email" style="flex: 1;">
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <label for="pesan" style="width: 100px;">Pesan:</label>
                                <textarea id="pesan" name="pesan" style="flex: 1;"></textarea>
                            </div>
                            <div>
                                <input type="submit" value="Kirim">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 mb-1">
                                <div>Rabu</div>
                                <div>26</div>
                                <div>Juni</div>
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body mb-5 text-xs">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-1">
                                <div>Rabu</div>
                                <div>26</div>
                                <div>Juni</div>
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body mb-5 text-xs">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-1">
                                <div>Rabu</div>
                                <div>26</div>
                                <div>Juni</div>
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body mb-5 text-xs">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-1">
                                <div>Rabu</div>
                                <div>26</div>
                                <div>Juni</div>
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body mb-5 text-xs">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 mb-1">
                                <div>Rabu</div>
                                <div>26</div>
                                <div>Juni</div>
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body mb-5 text-xs">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Perubahan Jadwal Latihan</h6>
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


    </div>
@endsection
