@extends('layout.masterAbsensiMahasiswaBidangKemahasiswaan')
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
                        <form method="GET" action="{{ route('absensiMahasiswa.show', $ukm->id) }}">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="end_date">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                                <div class="form-group col-md-2 align-self-end">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <!-- Tabel Absensi -->
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama UKM</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">Jumlah Kehadiran</th>
                                        <th scope="col">Jumlah Latihan</th>
                                        <th scope="col">Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($anggota as $member)
                                        <tr>
                                            <td>{{ $ukm->nama_ukm }}</td>
                                            <td>{{ $member->nama_mahasiswa }}</td>
                                            <td>{{ $member->jumlah_kehadiran }}</td>
                                            <td>8</td> <!-- Asumsi 8 kali latihan dalam sebulan -->
                                            <td>{{ $member->persentase_kehadiran }}%</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            {{-- <td colspan="5" class="text-center">Data absensi belum tersedia.</td> --}}
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
