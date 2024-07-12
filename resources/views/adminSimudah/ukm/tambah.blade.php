@extends('layout.masterCreateUKMAdminSimudah')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Data UKM/HMJ</h1>
                    </div>

                    <div class="card-body" style="display: flex; flex-direction: column;">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('ukm.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama_ukm">Nama UKM</label>
                                <input type="text" class="form-control @error('nama_ukm') is-invalid @enderror"
                                    id="nama_ukm" name="nama_ukm" value="{{ old('nama_ukm') }}">
                                @error('nama_ukm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pembina_id">Pembina</label>
                                <select class="form-control @error('pembina_id') is-invalid @enderror" id="pembina_id"
                                    name="pembina_id">
                                    <option value="">Pilih Pembina</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('pembina_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pembina_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pelatih_id">Pelatih</label>
                                <select class="form-control @error('pelatih_id') is-invalid @enderror" id="pelatih_id"
                                    name="pelatih_id">
                                    <option value="">Pilih Pelatih</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('pelatih_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pelatih_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ketuaMahasiswa_id">Ketua Mahasiswa</label>
                                <select class="form-control @error('ketuaMahasiswa_id') is-invalid @enderror"
                                    id="ketuaMahasiswa_id" name="ketuaMahasiswa_id">
                                    <option value="">Pilih Ketua Mahasiswa</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('ketuaMahasiswa_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('ketuaMahasiswa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <label for="status_user" style="margin-bottom: 5px;">Status</label>
                            <select name="status" class="form-control" style="margin-bottom: 10px" required>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Non-aktif">Non Aktif</option>
                            </select>

                            <label for="kategori" style="margin-bottom: 5px;">Kategori</label>
                            <select name="kategori" class="form-control" style="margin-bottom: 10px" required>
                                <option value="UKM" selected>UKM</option>
                                <option value="HMJ">HMJ</option>
                            </select>


                            <button type="submit" class="btn btn-auto btn-primary shadow-sm bg-green"
                                style="background-color: green;">
                                <span class="text">Simpan Data</span>
                            </button>

                            <a href="{{ route('ukm.index') }}" class="btn btn-auto btn-primary shadow-sm">
                                <span class="text">Batal</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
