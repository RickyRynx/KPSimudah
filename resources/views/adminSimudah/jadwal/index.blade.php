@extends('layout.masterJadwalAdminSimudah')
@section('content')
    <div class="container">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('jadwalAdminSimudah.create') }}" class="btn btn-auto btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Jadwal</span>
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <h1>Jadwal</h1>

                <div class="d-sm-flex align-items-center justify-content-between mb-0">

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama UKM</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwals as $index => $jadwal)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $jadwal->ukm->nama_ukm }}</td>
                                        <td>{{ $jadwal->waktu_mulai }}</td>
                                        <td>{{ $jadwal->waktu_selesai }}</td>
                                        <td>{{ $jadwal->hari }}</td>
                                        <td>{{ $jadwal->tempat }}</td>
                                        <td>
                                            <a href="{{ route('jadwalAdminSimudah.edit', $jadwal->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Jadwal Belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $jadwals->links() }} --}}
                    </div>
                </div>
            </div>
        @endsection
