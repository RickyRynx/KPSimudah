@extends('layout.masterJadwalAdminSimudah')

@section('content')
<div class="container">
    <div class="card shadow m-4">
        <div class="card-header py-3">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-0">
                <h1 class="h4 mb-0 text-gray-800">Edit Jadwal</h1>
            </div>
        </div>

        <div class="card-body py-3">
            <form action="{{ route('jadwalAdminSimudah.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="ukm_id">Nama UKM</label>
                    <select class="form-control" id="ukm_id" name="ukm_id" required>
                        @foreach($ukms as $ukm)
                            <option value="{{ $ukm->id }}" {{ $jadwal->ukm_id == $ukm->id ? 'selected' : '' }}>{{ $ukm->nama_ukm }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ $jadwal->waktu_mulai }}" required>
                </div>

                <div class="form-group">
                    <label for="waktu_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ $jadwal->waktu_selesai }}" required>
                </div>

                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select class="form-control" id="hari" name="hari[]" multiple required>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ in_array($hari, explode(',', $jadwal->hari)) ? 'selected' : '' }}>{{ $hari }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $jadwal->tempat }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('jadwalAdminSimudah.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
