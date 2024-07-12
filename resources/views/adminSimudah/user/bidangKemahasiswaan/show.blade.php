@extends('layout.masterAddBidangKemahasiswaan')
@section('content')
    <div class="container col-10">
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('addBidangKemahasiswaan.create') }}" class="btn btn-auto btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Akun Bidang Kemahasiswaan</span>
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <h1>Bidang Kemahasiswaan (Wakil Rektor III)</h1>

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
                            {{-- @php $index = 0; @endphp --}}
                            @forelse ($kemahasiswaans as $index => $kemahasiswaan)
                                <tr>
                                    <td>{{ $index + 1 }}</td> <!-- Menggunakan variabel index untuk nomor urut -->
                                    <td>{{ $kemahasiswaan->name }}</td>
                                    <td>{{ $kemahasiswaan->username }}</td>
                                    <td>{{ $kemahasiswaan->email }}</td>
                                    <td>
                                        <a href="{{ route('addBidangKemahasiswaan.edit', $kemahasiswaan->id) }}"
                                            class="btn btn-primary mb-2">Edit</a>
                                        <form action="{{ route('addBidangKemahasiswaan.destroy', $kemahasiswaan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus akun ini?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Data Admin Keuangan Belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $adminKeuangans->links() }} --}}
                </div>
                <div class="form-group">
                    {{-- <button type="submit" class="btn btn-primary">Update Data</button> --}}
                    <a href="/user" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
