@extends('layout.masterLaporanPelatih')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Pelatih</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form Input Tanggal -->
                        <form action="/submit-endpoint" method="post" id="myForm">
                            <div class="form-group">
                                <label for="tanggalMulai">Tanggal Mulai:</label>
                                <input type="date" id="tanggalMulai" name="tanggalMulai" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tanggalSelesai">Tanggal Selesai:</label>
                                <input type="date" id="tanggalSelesai" name="tanggalSelesai" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>

                        <script>
                            // JavaScript untuk mereset tanggal pada form
                            document.addEventListener('DOMContentLoaded', function() {
                                var form = document.getElementById('myForm');
                                form.reset();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
