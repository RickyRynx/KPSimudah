@extends('layout.masterAnggotaKetuaUKM')
@section('content')
    <div class="container">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <a href="{{ route('anggota.create', $ukm->id) }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Tambah Anggota</span>
                    </a>

                    {{-- <a href="#" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-square"></i>
                        </span>
                        <span class="text">Lihat Semua Anggota</span>
                    </a> --}}

                </div>
            </div>

            <div class="card-body py-3">
                <h1>Anggota {{ $ukm->nama_ukm }}</h1>
                <div class="d-sm-flex align-items-center justify-content-between mb-0">

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    <th scope="col">NPM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggotas as $anggota)
                                    @if ($anggota->ukm_id == $ukm->id)
                                        <tr>
                                            {{-- <td>{{ $anggota->id }}</td> --}}
                                            <td>{{ $anggota->npm }}</td>
                                            <td>{{ $anggota->nama_mahasiswa }}</td>
                                            <td>{{ $anggota->email }}</td>
                                            <td>{{ $anggota->nomor_hp }}</td>
                                            <td>{{ $anggota->jabatan }}</td>
                                            <td>{{ $anggota->status_user }}</td>
                                            <td>
                                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <div class="alert alert-danger">
                                        Data Anggota belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $anggotas->links() }} --}}
                    </div>


                </div>

            </div>
        </div>

    </div>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
