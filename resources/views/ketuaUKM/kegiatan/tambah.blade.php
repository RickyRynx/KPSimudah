@extends('layout.masterCreateKegiatanKetuaUKM')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 mx-auto">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h1>Tambah Kegiatan</h1>
                    </div>

                    <!-- Card Body -->
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

                        <form id="kegiatanForm" action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="display: flex; flex-direction: column;">
                                <div class="mb-1">
                                    <label for="no_usulan" class="form-label">No Usulan</label>
                                    <input type="text" class="form-control" name="no_usulan" value="{{ $newNoUsulan }}" readonly required>
                                </div>

                                <div class="mb-1">
                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan/Lomba</label>
                                    <input type="text" class="form-control" name="nama_kegiatan" required>
                                </div>

                                <div class="mb-1">
                                    <label for="afiliasi_lomba" class="form-label">Afiliasi Lomba</label>
                                    <div>
                                        <label><input type="radio" name="afiliasi_lomba" value="Internal" required> Internal</label>
                                        <label><input type="radio" name="afiliasi_lomba" value="Eksternal" required> Eksternal</label>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label for="file_usulan" class="form-label">File Usulan Lomba</label>
                                    <input type="file" class="form-control" name="file_usulan" id="file_usulan" accept=".pdf, .doc" required>
                                </div>

                                <div class="mb-1">
                                    <label for="skala_lomba" class="form-label">Skala Lomba</label>
                                    <div>
                                        <label><input type="radio" name="skala_lomba" value="Regional" required> Regional</label>
                                        <label><input type="radio" name="skala_lomba" value="Nasional" required> Nasional</label>
                                        <label><input type="radio" name="skala_lomba" value="Internasional" required> Internasional</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="laporan_lomba" class="form-label">Laporan</label>
                                    <input type="file" class="form-control" name="laporan_lomba" id="laporan_lomba" accept=".pdf, .doc" required>
                                </div>

                                <button id="submitBtn" type="submit" class="btn btn-success shadow-sm bg-green mb-2" style="background-color: green;">Tambah Kegiatan</button>

                                <a href="{{ route('kegiatan.show', ['id' => $ukm->id]) }}" class="btn btn-auto btn-primary shadow-sm">
                                    <span class="text">Batal</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.getElementById('file_usulan').addEventListener('change', validateFile);
    document.getElementById('laporan_lomba').addEventListener('change', validateFile);

    function validateFile() {
        var fileUsulan = document.getElementById('file_usulan').files[0];
        var laporanLomba = document.getElementById('laporan_lomba').files[0];
        var submitBtn = document.getElementById('submitBtn');
        var allowedExtensions = /(\.pdf|\.doc)$/i;

        var isFileUsulanValid = fileUsulan && allowedExtensions.exec(fileUsulan.name);
        var isLaporanLombaValid = laporanLomba && allowedExtensions.exec(laporanLomba.name);

        if (isFileUsulanValid && isLaporanLombaValid) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
            alert('File harus bertipe PDF atau Word (.doc)');
        }
    }

    document.getElementById('kegiatanForm').addEventListener('submit', function(event) {
        var submitBtn = document.getElementById('submitBtn');
        if (submitBtn.disabled) {
            event.preventDefault();
        }
    });

    // Initial validation to disable submit button on page load
    validateFile();
</script>
