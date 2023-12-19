@extends('layout.masterUKMAdminSimudah')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Edit Data UKM/HMJ</h1>
                    </div>


                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between ml-3">
                            <form action="/submit" method="post" style="width: 300px;">
                                <label for="namaUkmHmj" style="margin-bottom: 3px;">Nama UKM/HMJ</label>
                                <input type="text" id="namaUkmHmj" name="namaUkmHmj" required
                                    style="margin-bottom: 3px;">
                            </form>

                            <form action="/submit" method="post" style="width: 300px;">
                                <label for="statusPelatih" style="margin-bottom: 3px;">Status Pelatih</label>
                                <input type="text" id="statusPelatih" name="statusPelatih" required
                                    style="margin-bottom: 3px;">
                            </form>
                        </div>

                        <div class="card-body" style="display: flex; flex-direction: column;">
                            <form action="/submit" method="post" style="width: 300px;">
                                <label for="namaPembina" style="margin-bottom: 5px;">Nama Pembina</label>
                                <input type="text" id="namaPembina" name="namaPembina" required
                                    style="margin-bottom: 10px;">

                                <label for="namaPelatih" style="margin-bottom: 5px;">Nama Pelatih</label>
                                <input type="text" id="namaPelatih" name="namaPelatih" required
                                    style="margin-bottom: 10px;">

                                <label for="namaKetuaMahasiswa" style="margin-bottom: 5px;">Nama Ketua Mahasiswa</label>
                                <input type="text" id="namaKetuaMahasiswa" name="namaKetuaMahasiswa" required
                                    style="margin-bottom: 10px;">

                                <label for="status" style="margin-bottom: 5px;">Status Ketua Mahasiswa</label>
                                <input type="text" id="status" name="status" required style="margin-bottom: 10px;">

                            </form>
                            <a href="/ukm/EditData" class="btn btn-auto  btn-primary shadow-sm bg-green mb-2"
                                style="background-color: green;">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                                <span class="text">Edit Data</span>
                            </a>

                            <a href="/ukm" class="btn btn-auto  btn-primary shadow-sm">
                                <span class="icon text-black-50">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                                <span class="text">Batal</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
