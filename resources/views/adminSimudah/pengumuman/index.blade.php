@extends('layout.masterPengumumanAdminSimudah')
@section('content')
    <div class="container">

        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('pengumumanAdminSimudah.create') }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Pengumuman</span>
                    </a>
                </div>

                <div class="card-body py-3">
                    <h1>Pengumuman</h1>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi Pengumuman</th>
                                    <th scope="col">Upload By</th>
                                    <th scope="col">Waktu Upload</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengumumen as $pengumuman)
                                    <tr>
                                        <td>{{ $pengumuman->id }}</td>
                                        <td>{{ $pengumuman->judul }}</td>
                                        <td>{{ $pengumuman->isi_pengumuman }}</td>
                                        <td>{{ $pengumuman->ketuaMahasiswa->name }}</td>
                                        <td>{{ $pengumuman->waktu_upload }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary mb-2">Edit</a>
                                            <a href="#" class="btn btn-danger mb-2">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pengumuman Belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $pengumumen->links() }} --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
