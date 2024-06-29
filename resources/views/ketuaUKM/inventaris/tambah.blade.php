@extends('layout.masterCreateInventaris')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Inventaris</h1>
                    </div>


                    <!-- Card Body -->

                    <div class="card-body">
                        <form action="{{ route('inventaris.store') }}" method="POST">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" required>
                                </div>

                                <div class="mb-1">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </div>

                                <div class="mb-1">
                                    <label for="jumlah_rusak" class="form-label">Jumlah Rusak</label>
                                    <input type="number" class="form-control" name="jumlah_rusak">
                                </div>

                                <div class="mb-1">
                                    <label for="jumlah_bagus" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah_bagus">
                                </div>

                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" required>
                                </div>

                                {{-- <label for="ukm_id" style="margin-bottom: 5px;">Nama UKM/HMJ</label>
                                <select name="ukm_id" class="form-control" style="margin-bottom: 10px;" required>
                                    <option value=""selected>-</option>
                                    @foreach ($ukm as $ukm)
                                        <option value="{{ $ukm->id }}">{{ $ukm->nama_ukm }}</option>
                                    @endforeach
                                </select> --}}

                                <button type="submit" class="btn btn-success btn-primary shadow-sm bg-green mb-2"
                                    style="background-color: green;">Tambah Inventaris</button>

                                <a href="{{ route('inventaris.show', ['id' => $ukm->id]) }}"
                                    class="btn btn-auto  btn-primary shadow-sm">
                                    <span class="icon text-black-50">
                                        <i class="fas fa-plus-square"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
