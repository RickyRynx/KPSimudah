@extends('layout.masterJadwalKetuaUKM')
@section('content')
    <div class="container col-8">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <h1>Jadwal {{ $ukm->nama_ukm }}</h1>
                </div>

                <div class="card-body py-3">

                    <div class="mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Tempat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwals as $jadwal)
                                    @if ($jadwal->ukm_id == $ukm->id)
                                        <tr>
                                            <td>{{ $jadwal->hari }}</td>
                                            <td>{{ $jadwal->waktu_mulai }}</td>
                                            <td>{{ $jadwal->waktu_selesai }}</td>
                                            <td>{{ $jadwal->tempat }}</td>
                                        </tr>
                                    @endif
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

        </div>
    </div>
@endsection
