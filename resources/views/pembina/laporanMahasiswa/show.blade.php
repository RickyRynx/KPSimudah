@extends('layout.masterLaporanMahasiswaPembina')

@section('content')
    <div class="container">
        <div class="card-body py-3">
            <h1>Laporan Keaktifan Mahasiswa {{ $ukm->nama_ukm }}</h1>
            <div class="row-per-page">
                Show rows per page:
                <select id="rowsPerPage" onchange="changeRowsPerPage()">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>

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
                                <td>{{ $ukm->nama_ukm }}</td>
                                <td>{{ $absensi->month }}</td>
                                <td>{{ $absensi->year }}</td>
                                <td>
                                    {{-- <a href="{{ route('laporanMahasiswa.show', ['id' => $ukm->id, 'year' => $absensi->year, 'month' => $absensi->month]) }}"
                                        class="btn btn-primary">Lihat</a> --}}
                                    <a href="{{ route('laporanMahasiswa', ['id' => $ukm->id, 'year' => $absensi->year, 'month' => $absensi->month]) }}"
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
