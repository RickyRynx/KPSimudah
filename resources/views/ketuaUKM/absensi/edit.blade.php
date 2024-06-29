@extends('layout.masterAbsensiKetuaUKM')
@section('content')
<div class="container">
    <div class="card shadow m-4">
        <div class="card-header py-3">
            <h1>Edit Absensi</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $absensi->keterangan }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Foto Absensi</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if($absensi->image)
                        <img src="{{ url('storage/foto_absensi/' . $absensi->image) }}" alt="{{ $absensi->image }}" style="max-width: 100px; margin-top: 10px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="kehadiran_pelatih">Kehadiran Pelatih</label>
                    <input type="text" class="form-control" id="kehadiran_pelatih" name="kehadiran_pelatih" value="{{ $absensi->kehadiran_pelatih }}" required>
                </div>

                <div class="form-group">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ $absensi->waktu_mulai }}" required>
                </div>

                <div class="form-group">
                    <label for="waktu_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ $absensi->waktu_selesai }}" required>
                </div>

                {{-- <div class="form-group">
                    <label>Anggota</label>
                    @foreach($anggota as $member)
                        <div class="form-check">
                            <label class="form-check-label">{{ $member->nama }}</label>
                            <input type="radio" class="form-check-input" name="status_absensi[{{ $member->id }}]" value="H" {{ $member->status_absensi == 'H' ? 'checked' : '' }}> Hadir
                            <input type="radio" class="form-check-input" name="status_absensi[{{ $member->id }}]" value="I" {{ $member->status_absensi == 'I' ? 'checked' : '' }}> Izin
                            <input type="radio" class="form-check-input" name="status_absensi[{{ $member->id }}]" value="A" {{ $member->status_absensi == 'A' ? 'checked' : '' }}> Alfa
                        </div>
                    @endforeach
                </div> --}}

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('absensi.show', $absensi->ukm_id) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
