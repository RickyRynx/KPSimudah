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
                                    <input type="text" class="form-control" name="npm" required>
                                </div>

                                <div class="mb-1">
                                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="nama_mahasiswa" required>
                                </div>

                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="mb-1">
                                    <label for="nomor_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" name="nomor_hp" required>
                                </div>

                                <div class="mb-1">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" required>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label> <br>
                                    <select name="status" name="status" class="form-control" required>
                                        <option value="Aktif" selected>Aktif</option>
                                        <option value="Non-aktif">Non Aktif</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Anggota</button>

                                <a href="/anggota/create" class="btn btn-auto  btn-primary shadow-sm">
                                    <span class="icon text-black-50">
                                        <i class="fas fa-plus-square"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </a>
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
