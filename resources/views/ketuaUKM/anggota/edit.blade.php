@extends('layout.masterAnggotaKetuaUKM')
@section('content')
    <div class="container">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <h1>Edit Anggota</h1>
            </div>

            <div class="card-body py-3">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm" value="{{ $anggota->npm }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $anggota->nama_mahasiswa }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nomor_hp">No HP</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $anggota->nomor_hp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan" required>
                            <option value="KetuaUKM" {{ $anggota->jabatan == 'KetuaUKM' ? 'selected' : '' }}>Ketua UKM</option>
                            <option value="Sekretaris" {{ $anggota->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                            <option value="Anggota" {{ $anggota->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_user">Status</label>
                        <select class="form-control" id="status_user" name="status_user" required>
                            <option value="Aktif" {{ $anggota->status_user == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ $anggota->status_user == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('anggota.show', $anggota->ukm_id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
