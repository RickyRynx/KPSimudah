@extends('layout.masterBidangKemahasiswaan')
@section('content')
    <div class="container">
        <h1>Daftar UKM</h1>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable">
                <!-- Kolom-kolom lain -->
                <thead>
                    <tr>
                        <th>Nama UKM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ukm as $unit)
                        <tr>
                            <td>{{ $unit->nama_ukm }}</td>
                            <td>
                                <a href="{{ route('absensiUKMKeuangan.show', ['id' => $unit->id]) }}"
                                    class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Tidak ada UKM yang tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('ukmForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var selectedUkmId = document.getElementById('ukm_id').value;
            var formAction = "{{ url('laporanMahasiswaKemahasiswaan') }}/" + selectedUkmId;
            this.action = formAction;
            this.submit();
        });
    </script>
@endsection
