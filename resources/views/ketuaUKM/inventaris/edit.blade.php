@extends('layout.masterInventarisKetuaUKM')
@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <h1>Edit Anggota</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body py-3">
                <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="{{ $inventaris->nama_barang }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            value="{{ $inventaris->jumlah }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_rusak" class="form-label">Jumlah Rusak</label>
                        <input type="number" class="form-control" id="jumlah_rusak" name="jumlah_rusak"
                            value="{{ $inventaris->jumlah_rusak }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_bagus" class="form-label">Jumlah Bagus</label>
                        <input type="number" class="form-control" id="jumlah_bagus" name="jumlah_bagus"
                            value="{{ $inventaris->jumlah_bagus }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $inventaris->keterangan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('inventaris.show', ['id' => $ukm->id]) }}"
                        class="btn btn-auto  btn-primary shadow-sm">
                        <span class="text">Batal</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
