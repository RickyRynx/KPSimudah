@extends('layout.masterLaporanMahasiswaPembina')
@section('content')
    <div class="container">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <h1>Laporan Mahasiswa</h1>
            </div>

            <div class="card-body py-3">
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <div class="row-per-page">
                        Show rows per page:
                        <select id="rowsPerPage" onchange="changeRowsPerPage()">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>

                    <form class="d-none d-sm-inline-block form-inline mr-8 ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">UKM/HMJ
                                </th>
                                <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Bulan
                                </th>
                                <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Tahun
                                </th>
                                <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Laporan
                                </th>
                                <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid; padding: 8px; text-align: left;"></td>

                            </tr>
                        </tbody>
                    </table>
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
                    var table = document.getElementById('tb_anggota');
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

    </div>
@endsection
