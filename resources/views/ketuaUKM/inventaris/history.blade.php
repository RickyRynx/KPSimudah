@extends('layout.masterHistoryInventaris')
@section('content')
    <div class="container col-10">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <h1>History Inventaris {{ $ukm->nama_ukm }}</h1>
            </div>

            <div class="card-body py-3">
                <div class="mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Sebelum</th>
                                <th scope="col">Sesudah</th>
                                <th scope="col">Waktu Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $index => $history)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $history->inventaris->nama_barang }}</td>
                                    <td>{{ $history->action }}</td>
                                    <td>{{ $history->old_values_string }}</td>
                                    <td>{{ $history->new_values_string }}</td>
                                    <td>{{ $history->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('inventaris.show', ['id' => $ukm->id]) }}"
                        class="btn btn-auto  btn-primary shadow-sm">
                        <span class="text">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
