<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi UKM dan HMJ MDP (SIMUDAH MDP)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding-bottom: 100px;
            /* Ruang untuk footer */
            position: relative;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 90px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }

        .spacer {
            width: 100px;
        }

        table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin-bottom: 100px;
            /* Jarak dari footer */
        }

        thead th {
            border: 1px solid black;
            padding: 10px;
            background-color: #f2f2f2;
        }

        tbody td {
            border: 1px solid black;
            padding: 10px;
        }

        footer {
            width: 100%;
            font-size: 12px;
            padding: 10px;
            /* border-top: 1px solid #000; */
            position: absolute;
            bottom: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
        }

        .footer-left,
        .footer-right {
            flex: 1;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        hr {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ $base64Logo }}" alt="Logo" class="logo">
        <h1>Laporan Kegiatan & Absensi {{ $absensis->ukm->nama_ukm }}</h1>
        <div class="spacer"></div>
    </header>
    <hr>

    <p>UKM: {{ $absensis->ukm->nama_ukm }}</p>
    <p>Tanggal: {{ $absensis->created_at->format('d M Y') }}</p>
    <p>Keterangan: {{ $absensis->keterangan }}</p>
    <p>Kehadiran Pelatih: {{ $absensis->kehadiran_pelatih }}</p>
    <p>Waktu Mulai: {{ $absensis->waktu_mulai }}</p>
    <p>Waktu Selesai: {{ $absensis->waktu_selesai }}</p>

    <h2>Detail Kehadiran Anggota {{ $absensis->ukm->nama_ukm }}</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Status Kehadiran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensiDetails as $detail)
                <tr>
                    <td>{{ $detail->anggota->nama_mahasiswa }}</td>
                    <td>{{ $detail->status_absensi }}</td>
                    <td>{{ $detail->keterangan_absensi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>*Note</p>
    <p>H: Hadir</p>
    <p>I: Izin</p>
    <p>A: Alpa</p>

    <h3 class="mb-3">Total Kehadiran: {{ $absensiDetails->where('status_absensi', 'H')->count() }}</h3>

    <footer>
        <div class="footer-left">
            <p>Dibuat oleh:</p>
            <p>Ketua UKM</p>
            <br><br><br>
            <p>{{ $user->name }}</p>
        </div>
    </footer>

    <footer>
        <div class="footer-right">
            <p>Diketahui oleh:</p>
            <p>Pembina UKM</p>
            <br><br><br>
            <p>{{ $ukm->pembina->name }}</p>
        </div>
    </footer>

</body>

</html>
