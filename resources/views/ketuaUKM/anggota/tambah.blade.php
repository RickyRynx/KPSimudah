@extends('layout.masterCreateAnggota')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Anggota</h1>
                    </div>


                    <!-- Card Body -->

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('anggota.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="number" class="form-control @error('npm') is-invalid @enderror" id="npm"
                                    name="npm" value="{{ old('npm') }}">
                                @error('npm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                    id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
                                @error('nama_mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nomor_hp">No HP</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                                    id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}">
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label> <br>
                                <select name="jabatan" class="form-control" required>
                                    <option value="Ketua" selected>Ketua UKM</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Anggota">Anggota</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status_user" class="form-label">Status</label> <br>
                                <select name="status_user" class="form-control" required>
                                    <option value="Aktif" selected>Aktif</option>
                                    <option value="Non-aktif">Non Aktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green"
                                style="background-color: green;">Tambah Anggota</button>

                            <a href="{{ route('anggota.show', ['id' => $ukm->id]) }}"
                                class="btn btn-auto btn-primary shadow-sm">
                                <span class="text">Batal</span>
                            </a>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
