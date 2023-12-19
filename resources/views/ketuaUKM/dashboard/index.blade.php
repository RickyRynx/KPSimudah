@extends('layout.master')
@section('content')
    <div class="container">
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="list-group-item list-group-item-action" href="/kegiatan">
                    <div class="card shadow h-100 py-0">
                        <div class="card-header py-2 align-items-top bg-dark">
                            <div class="col text-center">
                                <h6 class="m-2 font-weight-bold text-primary">Kegiatan/Lomba</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col text-center mr-2">
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">00/105
                                    </div>
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

            <!-- Pending Requests Card Example -->
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
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">00/105</div>
                                    <div class="h5 mt-3 font-weight-bold text-gray-800">Currently</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
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
            <div class="col-xl-7 col-lg-5">
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
            <div class="col-xl-5 col-lg-7">
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
            </div>
        </div>


    </div>
@endsection
