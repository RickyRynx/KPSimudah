@extends('layout.masterCreateKegiatanKetuaUKM')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Kegiatan</h1>
                    </div>


                    <!-- Card Body -->

                    <div class="card-body">
                        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="no_usulan" class="form-label">No Usulan</label>
                                    <input type="text" class="form-control" name="no_usulan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan/Lomba</label>
                                    <input type="text" class="form-control" name="nama_kegiatan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="afiliasi_lomba" class="form-label">Afiliasi Lomba</label>
                                    <input type="text" class="form-control" name="afiliasi_lomba" required>
                                </div>

                                <div class="mb-1">
                                    <label for="file_usulan" class="form-label">File Usulan Lomba</label>
                                    <input type="file" class="form-control" name="file_usulan" accept=".pdf" required>
                                </div>

                                <div class="mb-1">
                                    <label for="skala_lomba" class="form-label">Skala Lomba</label>
                                    <input type="text" class="form-control" name="skala_lomba" required>
                                </div>

                                <div class="mb-3">
                                    <label for="laporan_lomba" class="form-label">Laporan</label>
                                    <input type="text" class="form-control" name="laporan_lomba" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Kegiatan</button>

                                <a href="/jadwal/create" class="btn btn-auto  btn-primary shadow-sm">
                                    <span class="icon text-black-50">
                                        <i class="fas fa-plus-square"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
