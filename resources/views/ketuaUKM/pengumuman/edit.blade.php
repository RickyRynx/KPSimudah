@extends('layout.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Pengumuman
            </div>
            <div class="card-body">
                <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $pengumuman->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="isi_pengumuman" name="isi_pengumuman" rows="3" required>{{ $pengumuman->isi_pengumuman }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_upload" class="form-label">Waktu Upload</label>
                        <input type="datetime-local" class="form-control" id="waktu_upload" name="waktu_upload" value="{{ date('Y-m-d\TH:i', strtotime($pengumuman->waktu_upload)) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('pengumuman.show', $pengumuman->ukm_id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
