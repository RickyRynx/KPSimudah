@extends('layout.masterDataEmailAdminSimudah')
@section('content')
    <div class="container col-8">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('email.create') }}" class="btn btn-auto btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Email</span>
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <h1>Data Email</h1>

                <div class="d-sm-flex align-items-center justify-content-between mb-0">

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($emails as $index => $email)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $email->nama }}</td>
                                        <td>{{ $email->email }}</td>
                                        <td>
                                            <a href="{{ route('email.edit', $email->id) }}"
                                                class="btn btn-primary mb-2">Edit</a>
                                            <form action="{{ route('email.destroy', $email->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data Email Belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $emails->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
