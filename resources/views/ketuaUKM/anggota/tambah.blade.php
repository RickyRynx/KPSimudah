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
                        <form action="{{ route('anggota.store') }}" method="POST">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="number" class="form-control @error('npm') is-invalid @enderror"
                                        name="npm" required>
                                    @error('npm')
                                        <div class="text-danger">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required>
                                </div>

                                <div class="mb-1">
                                    <label for="nomor_hp" class="form-label">No HP</label>
                                    <input type="number" class="form-control @error('nomor_hp') is-invalid @enderror"
                                        name="nomor_hp" required>
                                    @error('nomor_hp')
                                        <div class="text-danger">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                {{-- <div class="mb-1">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" required>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label> <br>
                                    <select name="jabatan" class="form-control" required>
                                        <option value="Ketua" selected>Ketua UKM</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>

                                {{-- <label for="ukm_id" style="margin-bottom: 5px;">Nama UKM/HMJ</label>
                                <select name="ukm_id" class="form-control" style="margin-bottom: 10px;" required>
                                    <option value=""selected>-</option>
                                    @foreach ($ukm as $ukm)
                                        <option value="{{ $ukm->id }}">{{ $ukm->nama_ukm }}</option>
                                    @endforeach
                                </select> --}}

                                {{-- <input type="hidden" name="ukm_id" value="{{ $ukm->id }}"> --}}


                                <div class="mb-3">
                                    <label for="status_user" class="form-label">Status</label> <br>
                                    <select name="status_user" class="form-control" required>
                                        <option value="Aktif" selected>Aktif</option>
                                        <option value="Non-aktif">Non Aktif</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Anggota</button>

                                <a href="{{ route('anggota.show', ['id' => $ukm->id]) }}"
                                    class="btn btn-auto btn-primary shadow-sm">
                                    <span class="text">Batal</span>
                                </a>

                                {{-- @if (Auth::user()->ukm)
                                    <a href="{{ route('anggota.show', ['id' => Auth::user()->ukm->id]) }}"
                                        class="btn btn-auto btn-primary shadow-sm">
                                        <span class="icon text-black-50">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                        <span class="text">Batal</span>
                                    </a>
                                @else
                                    <!-- Tampilkan pesan atau lakukan tindakan alternatif jika user tidak terkait dengan UKM -->
                                    User tidak terkait dengan UKM.
                                @endif --}}
                                <script>
                                    function validateForm() {
                                        var npm = document.getElementById('npm').value;
                                        var namaMahasiswa = document.getElementById('namaMahasiswa').value;
                                        var email = document.getElementById('email').value;
                                        var noHp = document.getElementById('noHp').value;
                                        var jabatan = document.getElementById('jabatan').value;
                                        var status = document.getElementById('status').value;

                                        // Lakukan validasi sesuai kebutuhan
                                        if (npm === '' || namaMahasiswa === '' || email === '' || noHp === '' || jabatan === '' || status === '') {
                                            document.getElementById('peringatan').innerText = 'Field Harus Diisi!!';
                                            return false; // Form tidak akan dikirim jika tidak valid
                                        } else {
                                            // Form valid, lanjutkan dengan pengiriman formulir
                                            document.getElementById('peringatan').innerText = '';
                                            return true;
                                        }
                                    }
                                </script>


                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
