@extends('layout.masterKegiatanKetuaUKM')
@section('content')
    <div class="container">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('kegiatan.create') }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Kegiatan/Lomba</span>
                    </a>
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
            </div>

            <div class="card-body py-3">
                <h1>Kegiatan/Lomba</h1>
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
                                <th scope="col">No Usulan</th>
                                <th scope="col">Nama Kegiatan/Lomba</th>
                                <th scope="col">Afiliasi Lomba</th>
                                <th scope="col">File Usulan Lomba</th>
                                <th scope="col">Skala Lomba</th>
                                <th scope="col">Laporan</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatans as $kegiatan)
                                <tr>
                                    <td>{{ $kegiatan->id }}</td>
                                    <td>{{ $kegiatan->no_usulan }}</td>
                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $kegiatan->afiliasi_lomba }}</td>
                                    <td>{{ $kegiatan->file_usulan }}
                                        @if (isset($fileUsulan) && $fileUsulan->originalName)
                                            <p>Nama File: {{ $fileUsulan->originalName }}</p>
                                        @endif
                                    </td>
                                    <td>{{ $kegiatan->skala_lomba }}</td>
                                    <td>{{ $kegiatan->laporan_lomba }}</td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Kegiatan belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kegiatans->links() }}
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
    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
