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
                        <form action="{{ route('jadwalAdminSimudah.store') }}" method="POST">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="ukm_id" class="form-label">Nama UKM</label>
                                    <select name="ukm_id" class="form-control" style="margin-bottom: 10px;">
                                        <option value="" selected>-</option>
                                        @foreach ($ukms as $ukm)
                                            <option value="{{ $ukm->id }}">{{ $ukm->nama_ukm }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-1">
                                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                    <input type="time" class="form-control" name="waktu_mulai" required>
                                </div>

                                <div class="mb-1">
                                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                    <input type="time" class="form-control" name="waktu_selesai" required>
                                </div>

                                <div class="mb-1">
                                    <label for="hari" class="form-label">Hari</label>
                                    @foreach (['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'] as $day)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hari[]"
                                                value="{{ $day }}">
                                            <label class="form-check-label"
                                                for="{{ strtolower($day) }}">{{ $day }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mb-1">
                                    <label for="tempat" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" name="tempat" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Jadwal</button>

                                <a href="/jadwalAdminSimudah/create" class="btn btn-auto  btn-primary shadow-sm">
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
