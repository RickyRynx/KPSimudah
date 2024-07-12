@extends('layout.masterAbsensiMahasiswaAdminKeuangan')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1 style="text-align:center;">Absensi Mahasiswa</h1>
                        <h1 style="text-align:center;">{{ $ukm->nama_ukm }}</h1>
                    </div>

                    <div class="card-body py-3">
                        <!-- Form Filter Tanggal -->
                        <form method="GET" action="{{ route('absensiMahasiswaKeuangan.show', $ukm->id) }}">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="tanggal_awal">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="tanggal_akhir">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                                </div>
                                <div class="form-group col-md-2 align-self-end">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <!-- Tabel Absensi -->
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-responsive" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal/Waktu</th>
                                        <th scope="col">Jumlah Hadir</th>
                                        <th scope="col">Jumlah Izin</th>
                                        <th scope="col">Jumlah Alfa</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Jam Mulai</th>
                                        <th scope="col">Jam Berakhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($absensis as $index => $absensi)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($absensi->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $absensi->count_H }}</td>
                                            <td>{{ $absensi->count_I }}</td>
                                            <td>{{ $absensi->count_A }}</td>
                                            <td>{{ $absensi->keterangan }}</td>
                                            <td>
                                                <img src="{{ url('storage/foto_absensi/' . $absensi->image) }}"
                                                    alt="{{ $absensi->image }}" style="max-width: 100px;">
                                            </td>
                                            <td>{{ $absensi->waktu_mulai }}</td>
                                            <td>{{ $absensi->waktu_selesai }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Data Absensi belum tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $absensis->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
