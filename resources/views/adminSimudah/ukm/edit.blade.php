@extends('layout.masterCreateUKMAdminSimudah')

@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <h1 class="h4 mb-0 text-gray-800">Edit UKM/HMJ</h1>
                </div>
            </div>

            <div class="card-body py-3">
                <form action="{{ route('ukm.update', $ukm->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_ukm">Nama UKM/HMJ</label>
                        <input type="text" class="form-control" id="nama_ukm" name="nama_ukm"
                            value="{{ $ukm->nama_ukm }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pembina_id">Nama Pembina</label>
                        <select class="form-control" id="pembina_id" name="pembina_id">
                            <option value="">-- Pilih Pembina --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $ukm->pembina_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pelatih_id">Nama Pelatih</label>
                        <select class="form-control" id="pelatih_id" name="pelatih_id">
                            <option value="">-- Pilih Pelatih --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $ukm->pelatih_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ketuaMahasiswa_id">Nama Ketua</label>
                        <select class="form-control" id="ketuaMahasiswa_id" name="ketuaMahasiswa_id">
                            <option value="">-- Pilih Ketua Mahasiswa --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $ukm->ketuaMahasiswa_id == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_user">Status</label>
                        <select class="form-control" id="status_user" name="status_user">
                            <option value="Aktif" {{ $ukm->status_user == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ $ukm->status_user == 'Tidak Aktif' ? 'selected' : '' }}>Tidak
                                Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="UKM" {{ $ukm->kategori == 'UKM' ? 'selected' : '' }}>UKM</option>
                            <option value="HMJ" {{ $ukm->kategori == 'HMJ' ? 'selected' : '' }}>HMJ</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
