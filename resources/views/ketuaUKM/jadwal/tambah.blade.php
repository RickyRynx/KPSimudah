@extends('layout.masterCreateJadwal')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Jadwal</h1>
                    </div>


                    <!-- Card Body -->

                    <div class="card-body">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                    <input type="date" class="form-control" name="tanggal_kegiatan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="agenda_kegiatan" class="form-label">Agenda Kegiatan</label>
                                    <input type="text" class="form-control" name="agenda_kegiatan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
                                    <input type="text" class="form-control" name="lokasi_kegiatan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="penanggung_jawab" class="form-label">Penanggung Jawab</label>
                                    <input type="text" class="form-control" name="penanggung_jawab" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pelatih" class="form-label">Pelatih</label>
                                    <input type="text" class="form-control" name="pelatih" required>
                                </div>

                                <button type="submit" style="background-color: green;">Tambah Jadwal</button>


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
