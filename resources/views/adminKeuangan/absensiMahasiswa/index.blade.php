@extends('layout.masterAbsensiMahasiswaAdminKeuangan')
@section('content')
    <div class="container">
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 bg-dark    ">
                        <h1 class="putih">Filter Tanggal</h1>
                        <div class="justify-content-between">
                            <form action="/submit-endpoint" method="post" id="myForm" class="d-flex">
                                <div class="form-group mr-3">
                                    <input type="date" id="tanggalMulai" name="tanggalMulai" class="form-control">
                                </div>

                                <div class="form-group mr-3">
                                    <input type="date" id="tanggalSelesai" name="tanggalSelesai" class="form-control">
                                </div>

                                <div class="form-group mr-3">
                                    <select id="pilihanDropdown" name="pilihanDropdown" class="form-control">
                                        <option value="opsi1">Opsi 1</option>
                                        <option value="opsi2">Opsi 2</option>
                                        <option value="opsi3">Opsi 3</option>
                                    </select>
                                </div>

                            </form>
                            <div>
                                <button type="submit" class="btn btn-primary ml-3">Lihat</button>
                            </div>
                        </div>
                        <style>
                            .putih {
                                color: white;
                            }
                        </style>
                    </div>


                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <div class="row-per-page">
                                Show:
                                <select id="rowsPerPage" onchange="changeRowsPerPage()">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                                Entries
                            </div>
                            <form
                                class="d-none d-sm-inline-block form-inline mr-8 ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">No
                                        </th>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">
                                            Tanggal/Waktu</th>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Jumlah
                                            Hadir</th>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Jumlah
                                            Izin</th>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">
                                            Keterangan</th>
                                        <th scope="col" style="border: 1px solid; padding: 8px; text-align: left;">Foto
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                                        <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
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
                                        <td style="border: 1px solid; padding: 8px; text-align: left;"></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" style="border: 1px solid; padding: 8px; text-align: left;"></th>
                                        <td style="border: 1px solid; padding: 8px; text-align: left;"></td>
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
            </div>

        </div>
    </div>
@endsection
