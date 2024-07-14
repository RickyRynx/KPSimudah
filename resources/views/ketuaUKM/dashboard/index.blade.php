@extends('layout.master')
@section('content')
    <div class="container">
        <div class="mb-3">
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

        <!-- Content Row -->
        <div class="row">
            <!-- Anggota Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/anggota">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Anggota</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $anggotas }}</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-address-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Absensi Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/absensi">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Absensi</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $absensis }}</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kegiatan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/kegiatan">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Kegiatan</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $kegiatans }}</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Inventaris Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/inventaris">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Inventaris</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">{{ $inventaris }}</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-5 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($jadwals as $jadwal)
                                <div class="col-lg-6 mb-1">
                                    <div>UKM/HMJ: {{ $ukm->nama_ukm }}</div>
                                    <div>Jadwal Latihan: {{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</div>
                                    <div>Tempat: {{ $jadwal->tempat }}</div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">Tidak ada jadwal yang tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pie Chart -->
            {{-- <div class="col-xl-5 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Perubahan Jadwal Latihan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <h6>Jadwal Awal</h6>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-5 col-form-label">Hari/Tanggal:</label>
                                <div class="col-sm-7 mx-auto">
                                    <input type="date" class="form-control" id="colFormLabel">
                                </div>
                            </div>

                            <h6>Jadwal Pengganti</h6>
                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-5 col-form-label">Hari/Tanggal:</label>
                                <div class="col-sm-7 mx-auto">
                                    <input type="date" class="form-control" id="colFormLabel">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="colFormLabel" class="col-sm-5 col-form-label">Alasan:</label>
                                <div class="col-sm-7 mx-auto">
                                    <textarea name="alasan" class="form-control" name="alasan"></textarea>
                                </div>
                            </div>

                            <button type="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div> --}}
        </div>


    </div>
@endsection
