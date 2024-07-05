@extends('layout.masterLaporanMahasiswaBidangKemahasiswaan')
@section('content')
    <div class="container">
        <div class="card-body py-3">
            <h1>Laporan Keaktifan Mahasiswa</h1>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">UKM</th>
                            <th scope="col">Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensis as $absensi)
                            <tr>
                                <td>{{ $absensi->ukm_nama }}</td>
                                <td>{{ $absensi->month }}</td>
                                <td>{{ $absensi->year }}</td>
                                <td>
                                    <a href="{{ route('laporanMahasiswaBidangKemahasiswaan', ['id' => $absensi->ukm_id, 'year' => $absensi->year, 'month' => $absensi->month]) }}"
                                        class="btn btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data absensi belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $absensis->links() }} --}}
            </div>
        </div>
    </div>
@endsection
