@extends('layout.masterKegiatanPelatih')
@section('content')
    <div class="container col-8">
        <div class="card shadow m-4">

            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <h1>Kegiatan/Lomba {{ $ukm->nama_ukm }}</h1>
                </div>
            </div>

            <div class="card-body py-3">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Usulan</th>
                                <th scope="col">Nama Kegiatan/Lomba</th>
                                <th scope="col">Afiliasi Lomba</th>
                                {{-- <th scope="col">File Usulan Lomba</th> --}}
                                <th scope="col">Skala Lomba</th>
                                {{-- <th scope="col">Laporan</th> --}}
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatans as $kegiatan)
                                @if ($kegiatan->ukm_id == $ukm->id)
                                    <tr>
                                        <td>{{ $kegiatan->id }}</td>
                                        <td>{{ $kegiatan->no_usulan }}</td>
                                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                                        <td>{{ $kegiatan->afiliasi_lomba }}</td>
                                        {{-- <td>
                                                <a href="{{ url('storage/file_usulan/' . $kegiatan->file_usulan) }}"
                                                    target="_blank">
                                                    {{ basename($kegiatan->file_usulan) }}
                                                </a>
                                            </td> --}}

                                        <td>{{ $kegiatan->skala_lomba }}</td>
                                        {{-- <td>
                                                <a href="{{ url('storage/file_laporan/' . $kegiatan->laporan_lomba) }}"
                                                    target="_blank">
                                                    {{ basename($kegiatan->laporan_lomba) }}
                                                </a>
                                            </td> --}}
                                        {{-- <td>
                                                <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </td> --}}
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
@endsection
