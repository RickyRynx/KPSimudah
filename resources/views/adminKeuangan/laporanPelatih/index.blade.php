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
                        <form action="{{ route('laporanPelatih.filter') }}" method="post" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="tanggalMulai">Tanggal Mulai:</label>
                                <input type="date" id="tanggalMulai" name="tanggalMulai" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggalSelesai">Tanggal Selesai:</label>
                                <input type="date" id="tanggalSelesai" name="tanggalSelesai" class="form-control"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>

                        @if (isset($laporan))
                            <h4 class="mt-4">Laporan Kehadiran Pelatih dari {{ $tanggalMulai }} sampai
                                {{ $tanggalSelesai }}</h4>
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Nama UKM</th>
                                        {{-- <th>Nama Pelatih</th> --}}
                                        <th>Kehadiran Pelatih</th>
                                        <th>Jumlah Latihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $data)
                                        <tr>
                                            <td>{{ $data['ukm'] }}</td>
                                            {{-- <td>{{ $data['pelatih'] }}</td> --}}
                                            <td>{{ $data['total_kehadiran'] }}</td>
                                            <td>{{ $data['jumlah_latihan'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

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
