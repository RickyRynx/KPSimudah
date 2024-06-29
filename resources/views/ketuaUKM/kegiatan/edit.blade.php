@extends('layout.masterCreateKegiatanKetuaUKM')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <div class="card-header py-3">
                        <h1>Edit Kegiatan</h1>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="no_usulan" class="form-label">No Usulan</label>
                                    <input type="text" class="form-control" name="no_usulan" value="{{ $kegiatan->no_usulan }}" readonly required>
                                </div>

                                <div class="mb-1">
                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan/Lomba</label>
                                    <input type="text" class="form-control" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" required>
                                </div>

                                <div class="mb-1">
                                    <label for="afiliasi_lomba" class="form-label">Afiliasi Lomba</label>
                                    <div>
                                        <label><input type="radio" name="afiliasi_lomba" value="Internal" {{ $kegiatan->afiliasi_lomba == 'Internal' ? 'checked' : '' }} required> Internal</label>
                                        <label><input type="radio" name="afiliasi_lomba" value="Eksternal" {{ $kegiatan->afiliasi_lomba == 'Eksternal' ? 'checked' : '' }} required> Eksternal</label>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label for="file_usulan" class="form-label">File Usulan Lomba</label>
                                    <input type="file" class="form-control" name="file_usulan" id="file_usulan" accept=".pdf, .doc">
                                </div>

                                <div class="mb-1">
                                    <label for="skala_lomba" class="form-label">Skala Lomba</label>
                                    <div>
                                        <label><input type="radio" name="skala_lomba" value="Regional" {{ $kegiatan->skala_lomba == 'Regional' ? 'checked' : '' }} required> Regional</label>
                                        <label><input type="radio" name="skala_lomba" value="Nasional" {{ $kegiatan->skala_lomba == 'Nasional' ? 'checked' : '' }} required> Nasional</label>
                                        <label><input type="radio" name="skala_lomba" value="Internasional" {{ $kegiatan->skala_lomba == 'Internasional' ? 'checked' : '' }} required> Internasional</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="laporan_lomba" class="form-label">Laporan</label>
                                    <input type="file" class="form-control" name="laporan_lomba" id="laporan_lomba" accept=".pdf, .doc">
                                </div>

                                <button id="submitBtn" type="submit" class="btn btn-success shadow-sm bg-green mb-2" style="background-color: green;">Update Kegiatan</button>
                                <a href="{{ route('kegiatan.show', $kegiatan->ukm_id) }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
