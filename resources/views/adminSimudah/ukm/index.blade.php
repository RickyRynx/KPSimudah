@extends('layout.masterUKMAdminSimudah')
@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ url('ukm/create') }}" class="btn btn-auto btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah UKM/HMJ</span>
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <h1>UKM/HMJ</h1>


                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama UKM/HMJ</th>
                                <th scope="col">Nama Pembina</th>
                                <th scope="col">Nama Pelatih</th>
                                <th scope="col">Nama Ketua</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="ukms">
                            @forelse ($ukms as $ukm)
                                <tr>
                                    <td>{{ $ukm->id }}</td>
                                    <td>{{ $ukm->nama_ukm }}</td>
                                    <td>{{ $ukm->pembina ? $ukm->pembina->name : '-' }}</td>
                                    <td>{{ $ukm->pelatih ? $ukm->pelatih->name : '-' }}</td>
                                    <td>{{ $ukm->ketuaMahasiswa ? $ukm->ketuaMahasiswa->name : '-' }}</td>
                                    <td>{{ $ukm->status_user }}</td>
                                    <td>
                                            <a href="{{ route('ukm.edit', $ukm->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data UKM/HMJ Belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $ukms->links() }} --}}
                </div>
            @endsection
