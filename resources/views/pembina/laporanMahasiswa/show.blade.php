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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                {{ $absensis->links() }}
            </div>

            {{-- <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center mb-0">
                    <div class="dataTables_info ml-2">Showing</div>
                    <div class="paginate">
                        <button onclick="previousPage()">Previous Page</button>
                        <span id="pageNumber">1</span>
                        <button onclick="nextPage()">Next Page</button>
                    </div>
                </div>
            </div> --}}

            <script>
                var table = document.querySelector('tbody');
                var pageNumber = 1;
                var rowsPerPage = 5;
                var rows = table.querySelectorAll('tr');
                let table = new DataTable('dataTable');

                function changeRowsPerPage() {
                    rowsPerPage = document.getElementById('rowsPerPage').value;
                    showCurrentPage();
                }

                function showCurrentPage() {
                    var startIndex = (pageNumber - 1) * rowsPerPage;
                    var endIndex = startIndex + parseInt(rowsPerPage);

                    rows.forEach((row, index) => {
                        row.style.display = index >= startIndex && index < endIndex ? 'table-row' : 'none';
                    });

                    document.getElementById('pageNumber').innerText = pageNumber;
                }

                function previousPage() {
                    if (pageNumber > 1) {
                        pageNumber--;
                        showCurrentPage();
                    }
                }

                function nextPage() {
                    var maxPage = Math.ceil(rows.length / rowsPerPage);
                    if (pageNumber < maxPage) {
                        pageNumber++;
                        showCurrentPage();
                    }
                }

                showCurrentPage();
            </script>
        </div>
    </div>
@endsection
