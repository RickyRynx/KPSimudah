@extends('layout.masterAbsensiPelatih')
@section('content')
    <div class="container">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <h1>Coach {{ Auth::user()->name }}</h1>
                </div>
            </div>

            <div class="card-body py-3">

                <div class="mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Pertemuan Ke-</th>
                                <th scope="col">Tanggal/waktu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kehadiran</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Berakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $totalHadir = 0;
                            $totalIzin = 0;
                            $totalAlpa = 0;
                        @endphp --}}
                            @forelse ($absensis as $index => $absensi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($absensi->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $absensi->keterangan }}</td>
                                    <td>{{ $absensi->kehadiran_pelatih }}</td>
                                    <td>{{ $absensi->waktu_mulai }}</td>
                                    <td>{{ $absensi->waktu_selesai }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Data Absensi belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        @endsection
