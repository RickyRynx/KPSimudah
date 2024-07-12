@extends('layout.masterAddKetuaUKM')
@section('content')
    <div class="container">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('addKetuaUKM.create') }}" class="btn btn-auto btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Akun Ketua UKM/HMJ</span>
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <h1>Ketua UKM/HMJ</h1>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ketuas as $index => $ketua)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ketua->name }}</td>
                                    <td>{{ $ketua->username }}</td>
                                    <td>{{ $ketua->email }}</td>
                                    {{-- <td>{{ $ketua->ukm->nama_ukm }}</td> --}}
                                    <td>
                                        <a href="{{ route('addKetuaUKM.edit', $ketua->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data Ketua Belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <a href="/user" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
