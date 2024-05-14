@extends('layout.masterLaporanInventarisPembina')
@section('content')
    <div class="container">

        <div class="card-body py-3">
            <h1>Inventaris {{ $ukm->nama_ukm }}</h1>
            <div class="row-per-page">
                Show rows per page:
                <select id="rowsPerPage" onchange="changeRowsPerPage()">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventaris as $inventaris)
                            @if ($inventaris->ukm_id == $ukm->id)
                                <tr>
                                    <td>{{ $inventaris->id }}</td>
                                    <td>{{ $inventaris->nama_barang }}</td>
                                    <td>{{ $inventaris->jumlah }}</td>
                                    <td>{{ $inventaris->keterangan }}</td>
                                </tr>
                            @endif
                        @empty
                            <div class="alert alert-danger">
                                Data Inventaris Belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $inventaris->links() }} --}}
            </div>


            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center mb-0">
                    <div class="dataTables_info ml-2">Showing</div>

                    <div class="paginate">
                        <button onclick="previousPage()">Previous Page</button>
                        <span id="pageNumber">1</span>
                        <button onclick="nextPage()">Next Page</button>
                    </div>
                </div>
            </div>


            <script>
                var table = document.getElementById('tb_jadwal');
                var pageNumber = 1;
                var rowsPerPage = 5; // Jumlah baris per halaman
                var rows = table.rows;

                function changeRowsPerPage() {
                    rowsPerPage = document.getElementById('rowsPerPage').value;
                    showCurrentPage();
                }

                function showCurrentPage() {
                    var startIndex = (pageNumber - 1) * rowsPerPage;
                    var endIndex = startIndex + parseInt(rowsPerPage);

                    for (var i = 0; i < rows.length; i++) {
                        if (i >= startIndex && i < endIndex) {
                            rows[i].style.display = 'table-row';
                        } else {
                            rows[i].style.display = 'none';
                        }
                    }
                    document.getElementById('pageNumber').innerText = 'Page: ' + pageNumber;
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
