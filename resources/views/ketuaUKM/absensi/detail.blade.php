@extends('layout.masterAbsensiKetuaUKM')
@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <h1>Detail Absensi</h1>
            </div>

            <div class="card-body py-3">
                <h2>Detail Absensi {{ $absensi->ukm->nama_ukm }}</h2>
                <p>Tanggal/Waktu: {{ \Carbon\Carbon::parse($absensi->created_at)->format('d/m/Y H:i') }}</p>
                <p>Keterangan: {{ $absensi->keterangan }}</p>
                <p>Jam Mulai: {{ $absensi->waktu_mulai }}</p>
                <p>Jam Selesai: {{ $absensi->waktu_selesai }}</p>
                <img src="{{ url('storage/foto_absensi/' . $absensi->image) }}" alt="{{ $absensi->image }}"
                    style="max-width: 100px;">

                <h3>Detail Absensi Anggota</h3>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Status Absensi</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensiDetails as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail->anggota->nama_mahasiswa }}</td>
                                <td>{{ $detail->status_absensi }}</td>
                                <td>{{ $detail->keterangan_absensi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
