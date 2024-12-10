@extends('layout.masterLaporanKegiatanPembina')
@section('content')
    <div class="container">
        <div class="card shadow m-4">

            <div class="card-body py-3">
                <h1>Kegiatan/Lomba {{ $ukm->nama_ukm }}</h1>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Usulan</th>
                                <th scope="col">Nama Kegiatan/Lomba</th>
                                <th scope="col">Afiliasi Lomba</th>
                                <th scope="col">File Usulan Lomba</th>
                                <th scope="col">Skala Lomba</th>
                                <th scope="col">Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatans as $index => $kegiatan)
                                @if ($kegiatan->ukm_id == $ukm->id)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kegiatan->no_usulan }}</td>
                                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                                        <td>{{ $kegiatan->afiliasi_lomba }}</td>
                                        <td>
                                            <a href="{{ url('storage/file_usulan/' . $kegiatan->file_usulan) }}"
                                                target="_blank">
                                                {{ basename($kegiatan->file_usulan) }}
                                            </a>
                                        </td>

                                        <td>{{ $kegiatan->skala_lomba }}</td>
                                        <td>
                                            <a href="{{ url('storage/file_laporan/' . $kegiatan->laporan_lomba) }}"
                                                target="_blank">
                                                {{ basename($kegiatan->laporan_lomba) }}
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <div class="alert alert-danger">
                                    Data Kegiatan belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $kegiatans->links() }} --}}
                </div>


            </div>

        </div>
    </div>

    </div>
@endsection
