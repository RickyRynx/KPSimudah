@extends('layout.masterAbsensiKetuaUKM')
@section('content')
    <div class="container">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('absensi.create', $ukm->id) }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Absensi</span>
                    </a>
                </div>

                <div class="card-body py-3">
                    <h1>Absensi {{ $ukm->nama_ukm }}</h1>

                    <div class="mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal/Waktu</th>
                                    <th scope="col">Jumlah Hadir</th>
                                    <th scope="col">Jumlah Izin</th>
                                    <th scope="col">Jumlah Alfa</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Berakhir</th>
                                    <th scope="col">Aksi</th>
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
                                        <td>{{ $absensi->count_H }}</td>
                                        <td>{{ $absensi->count_I }}</td>
                                        <td>{{ $absensi->count_A }}</td>
                                        <td>{{ $absensi->keterangan }}</td>
                                        <td>
                                            <img src="{{ url('storage/foto_absensi/' . $absensi->image) }}"
                                                alt="{{ $absensi->image }}" style="max-width: 100px;">

                                        </td>
                                        <td>{{ $absensi->waktu_mulai }}</td>
                                        <td>{{ $absensi->waktu_selesai }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Data Absensi belum tersedia.</td>
                                    </tr>
                                @endforelse
                                {{-- <tr>
                                <td colspan="2"><strong>Total</strong></td>
                                <td><strong>{{ $totalHadir }}</strong></td>
                                <td><strong>{{ $totalIzin }}</strong></td>
                                <td><strong>{{ $totalAlpa }}</strong></td>
                                <td colspan="5"></td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
