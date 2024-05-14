@extends('layout.masterLaporanInventarisPembina')
@section('content')
    <h1>Daftar UKM</h1>
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <!-- Kolom-kolom lain -->
            <thead>
                <tr>
                    <th>Nama UKM</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($ukm)
                    <tr>
                        <td>{{ $ukm->nama_ukm }}</td>
                        <td>
                            <a href="{{ route('laporanInventaris.show', ['id' => $ukm->id]) }}"
                                class="btn btn-primary">Lihat</a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">Tidak ada UKM yang tersedia</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
