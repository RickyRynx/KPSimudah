@extends('layout.masterInventarisKetuaUKM')
@section('content')
    <div class="container col-8">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('inventaris.create', $ukm->id) }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Inventaris</span>
                    </a>
                </div>

                <div class="card-body py-3">
                    <h1>Inventaris {{ $ukm->nama_ukm }}</h1>

                    <div class="mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($inventaris as $inventaris)
                                    @if ($inventaris->ukm_id == $ukm->id)
                                        <tr>
                                            <td>{{ $inventaris->id }}</td>
                                            <td>{{ $inventaris->nama_barang }}</td>
                                            <td>{{ $inventaris->jumlah }}</td>
                                            <td>{{ $inventaris->keterangan }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary mb-2">Edit</a>
                                                <a href="#" class="btn btn-danger mb-2">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <div class="alert alert-danger">
                                        Data Inventaris Belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $inventaris->links() }} --}}
                    </div>


                </div>

            </div>
        </div>

    </div>
@endsection
