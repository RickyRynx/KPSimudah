@extends('layout.masterUKMAdminSimudah')
@section('content')
    <div class="container">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
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

                <form method="GET" action="{{ route('ukm.index') }}">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ request('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak
                                    Aktif</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="kategori">Kategori</label>
                            <select id="kategori" name="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="UKM" {{ request('kategori') == 'UKM' ? 'selected' : '' }}>UKM</option>
                                <option value="HMJ" {{ request('kategori') == 'HMJ' ? 'selected' : '' }}>HMJ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

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
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="ukms">
                            @forelse ($ukms as $index => $ukm)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ukm->nama_ukm }}</td>
                                    <td>{{ $ukm->pembina ? $ukm->pembina->name : '-' }}</td>
                                    <td>{{ $ukm->pelatih ? $ukm->pelatih->name : '-' }}</td>
                                    <td>{{ $ukm->ketuaMahasiswa ? $ukm->ketuaMahasiswa->name : '-' }}</td>
                                    <td>{{ $ukm->status }}</td>
                                    <td>{{ $ukm->kategori }}</td>
                                    <td>
                                        <a href="{{ route('ukm.edit', $ukm->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data UKM/HMJ Belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $ukms->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
