@extends('layout.masterCreatePengumumanKetuaUKM')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Pengumuman</h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('pengumuman.store') }}" method="POST">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" required>
                                </div>

                                <div class="mb-1">
                                    <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                                    <input type="text" class="form-control" name="isi_pengumuman" required>
                                </div>

                                <div class="mb-3">
                                    <label for="waktu_upload" class="form-label">Waktu Upload</label>
                                    <input type="date" class="form-control" name="waktu_upload"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                </div>

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Pengumuman</button>

                                <a href="{{ route('pengumuman.show', ['id' => $ukm->id]) }}"
                                    class="btn btn-auto  btn-primary shadow-sm">
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
