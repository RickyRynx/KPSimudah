@extends('layout.masterLaporanInventarisPembina')
@section('content')
    <div class="container">

        <div class="card-body py-3">
            <h1>Inventaris {{ $ukm->nama_ukm }}</h1>

            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Jumlah Rusak</th>
                            <th scope="col">Jumlah Bagus</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventaris as $inventaris)
                            @if ($inventaris->ukm_id == $ukm->id)
                                <tr>
                                    <td>{{ $inventaris->id }}</td>
                                    <td>{{ $inventaris->nama_barang }}</td>
                                    <td>{{ $inventaris->jumlah }}</td>
                                    <td>{{ $inventaris->jumlah_rusak }}</td>
                                    <td>{{ $inventaris->jumlah_bagus }}</td>
                                    <td>{{ $inventaris->keterangan }}</td>
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
@endsection
