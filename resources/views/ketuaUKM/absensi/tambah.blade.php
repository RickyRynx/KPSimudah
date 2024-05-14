@extends('layout.masterCreateAbsensi')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Absensi</h1>
                    </div>

                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-0">
                            <a></a>
                            <form
                                class="d-none d-sm-inline-block form-inline mr-8 ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <label for="search" class="form-label">Search:</label>
                                    <input type="text" class="form-control ml-2" aria-label="search"
                                        aria-describedby="basic-addon2">
                                </div>
                            </form>
                        </div>

                        <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="image" class="form-label">Upload Foto</label>
                                    <input type="file" class="form-control" name="image" accept=".jpg" required>
                                </div>

                                <div class="mb-1">
                                    <label for="kehadiran_pelatih" class="form-label">Kehadiran Pelatih</label>
                                    <input type="text" class="form-control" name="kehadiran_pelatih" required>
                                </div>

                                <div class="mb-1">
                                    <label for="waktu_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai" required>
                                </div>

                                <div class="mb-1">
                                    <label for="waktu_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" class="form-control" name="waktu_selesai" id="waktu_selesai"
                                        required>
                                </div>


                                <table border="1" cellpadding="8" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                            <th>H</th>
                                            <th>I</th>
                                            <th>A</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anggota as $key => $anggotaItem)
                                            @if ($anggotaItem->ukm && $anggotaItem->ukm->id == $ukm->id)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td hidden><input type="text" value="{{ $anggotaItem->id }}"
                                                            name="anggota_id[{{ $anggotaItem->id }}]"></td>
                                                    <td>{{ $anggotaItem->nama_mahasiswa }}</td>
                                                    <td><input type="radio" name="status_absensi[{{ $anggotaItem->id }}]"
                                                            value="H"></td>
                                                    <td><input type="radio" name="status_absensi[{{ $anggotaItem->id }}]"
                                                            value="I"></td>
                                                    <td><input type="radio" name="status_absensi[{{ $anggotaItem->id }}]"
                                                            value="A" checked></td>
                                                    <td><input type="text"
                                                            name="keterangan_absensi[{{ $anggotaItem->id }}]">
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>


                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Absensi</button>

                                <a href="{{ route('absensi.show', ['id' => $ukm->id]) }}"
                                    class="btn btn-auto  btn-primary shadow-sm">
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

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Mengisi waktu saat form dimuat
                                        var currentTime = new Date();
                                        var hours = currentTime.getHours();
                                        var minutes = currentTime.getMinutes();
                                        var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;
                                        document.getElementById('waktu_mulai').value = formattedTime;
                                        document.getElementById('waktu_selesai').value = formattedTime;

                                        // Menampilkan jam saat di-klik
                                        document.getElementById('waktu_mulai').addEventListener('click', function() {
                                            var clickedTime = new Date();
                                            var hours = clickedTime.getHours();
                                            var minutes = clickedTime.getMinutes();
                                            var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') +
                                                minutes;
                                            document.getElementById('waktu_mulai').value = formattedTime;
                                        });

                                        document.getElementById('waktu_selesai').addEventListener('click', function() {
                                            var clickedTime = new Date();
                                            var hours = clickedTime.getHours();
                                            var minutes = clickedTime.getMinutes();
                                            var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') +
                                                minutes;
                                            document.getElementById('waktu_selesai').value = formattedTime;
                                        });
                                    });
                                </script>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
