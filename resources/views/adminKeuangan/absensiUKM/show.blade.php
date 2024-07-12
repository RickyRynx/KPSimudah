@extends('layout.masterAbsensiUKMAdminKeuangan')
@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-body py-3">
                <h1>Absensi {{ $ukm->nama_ukm }}</h1>

                <div class="mt-3">
                    <form action="{{ route('absensiUKMKeuangan.show', ['id' => $ukm->id]) }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                                        value="{{ request()->input('tanggal_awal') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                        value="{{ request()->input('tanggal_akhir') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>

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
                                </tr>
                            </thead>
                            <tbody>
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
                                    </tr>
                                @empty
                                    {{-- <tr>
                                    <td colspan="10" class="text-center">Silakan filter tanggal untuk melihat data absensi.</td>
                                </tr> --}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
