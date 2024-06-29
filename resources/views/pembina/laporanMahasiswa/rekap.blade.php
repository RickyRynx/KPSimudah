@extends('layout.masterLaporanInventarisPembina')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1 style="text-align:center;">Laporan Kehadiran Mahasiswa</h1>
                        <h1 style="text-align:center;">{{ $ukm->nama_ukm }}</h1>
                    </div>

                    <div class="card-body py-3">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jumlah Kehadiran</th>
                                        <th scope="col">Persentase Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($anggota as $member)
                                        <tr>
                                            <td>{{ $member->nama_mahasiswa }}</td>
                                            <td>{{ $member->jumlah_kehadiran }}</td>
                                            <td>{{ $member->persentase_kehadiran }}%</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data absensi belum tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $absensis->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
