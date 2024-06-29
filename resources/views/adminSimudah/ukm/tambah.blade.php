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
                        <form action="{{ route('ukm.store') }}" method="post">
                            @csrf
                            <label for="nama_ukm" style="margin-bottom: 5px;">Nama UKM/HMJ</label>
                            <input type="text" class="form-control" name="nama_ukm" required
                                style="margin-bottom: 10px;">

                            <!-- Nama Pembina, Pelatih, Ketua Mahasiswa fields ... -->
                            <label for="pembina_id" style="margin-bottom: 5px;">Nama Pembina</label>
                            <select name="pembina_id" class="form-control" style="margin-bottom: 10px;">
                                <option value=""selected>-</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                            <label for="pelatih_id" style="margin-bottom: 5px;">Nama Pelatih</label>
                            <select name="pelatih_id" class="form-control" style="margin-bottom: 10px;">
                                <option value=""selected>-</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                            <label for="ketuaMahasiswa_id" style="margin-bottom: 5px;">Nama Ketua Mahasiswa</label>
                            <select name="ketuaMahasiswa_id" class="form-control" style="margin-bottom: 10px;" required>
                                <option value=""selected>-</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>


                            <label for="status_user" style="margin-bottom: 5px;">Status User</label>
                            <select name="status_user" class="form-control" style="margin-bottom: 10px" required>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Non-aktif">Non Aktif</option>
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
