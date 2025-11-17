<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Raport PTS - {{ $siswa->nama_siswa }}</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 25px;
            font-size: 13px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .title {
            font-weight: bold;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: middle;
        }

        th {
            text-align: center;
            background: #f2f2f2;
        }

        .no-border {
            border: none !important;
        }

        .section-title {
            font-weight: bold;
            margin-top: 8px;
        }

        .signature {
            width: 100%;
            margin-top: 30px;
            text-align: center;
        }

        .signature td {
            border: none;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="title">LAPORAN HASIL PENILAIAN TENGAH SEMESTER</div>
        <div>Tahun Pelajaran {{ now()->year }}/{{ now()->year + 1 }}</div>
        <br>
        <table style="width: 100%; border: none;">
            <tr>
                <td class="no-border" style="width: 20%;">Nama Siswa</td>
                <td class="no-border">: {{ $siswa->nama_siswa }}</td>
                <td class="no-border" style="width: 20%;">Kelas</td>
                <td class="no-border">: {{ $siswa->kelas->nama_kelas ?? '-' }}</td>
            </tr>
            <tr>
                <td class="no-border">Semester</td>
                <td class="no-border">: Ganjil</td>
                <td class="no-border">Wali Kelas</td>
                <td class="no-border">: {{ $siswa->kelas->guru->nama_guru ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section-title">A. Nilai Akademik</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>KKM</th>
                <th>Nilai</th>
                <th>Nilai Rata-rata Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $index => $n)
            <tr>
                <td style="text-align:center;">{{ $index + 1 }}</td>
                <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                <td style="text-align:center;">{{ $n->mapel->kkm ?? '-' }}</td>
                <td style="text-align:center;">{{ $n->nilai }}</td>
                <td style="text-align:center;">{{ $n->rata_rata_kelas ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <div class="section-title">B. Kepribadian</div>
    <table>
        <tr>
            <td>1. Kelakuan</td>
            <td>{{ $siswa->raportPts->kelakuan ?? '-' }}</td>
        </tr>
        <tr>
            <td>2. Kerajinan</td>
            <td>{{ $siswa->raportPts->kerajinan ?? '-' }}</td>
        </tr>
        <tr>
            <td>3. Kerapian</td>
            <td>{{ $siswa->raportPts->kerapian ?? '-' }}</td>
        </tr>
    </table>

    <br>
    <div class="section-title">C. Ketidakhadiran</div>
    <table>
        <tr>
            <td>1. Sakit</td>
            <td>{{ $siswa->raportPts->sakit ?? '0' }} hari</td>
        </tr>
        <tr>
            <td>2. Izin</td>
            <td>{{ $siswa->raportPts->izin ?? '0' }} hari</td>
        </tr>
        <tr>
            <td>3. Tanpa Keterangan</td>
            <td>{{ $siswa->raportPts->tanpa_keterangan ?? '0' }} hari</td>
        </tr>
    </table>

    <br>
    <div class="section-title">D. Catatan untuk Orang Tua/Wali</div>
    <table>
        <tr>
            <td style="height: 60px;">{{ $siswa->raportPts->catatan ?? '-' }}</td>
        </tr>
    </table>

    <table class="signature">
        <tr>
            <td style="text-align:center;">
                Mengetahui,<br>Orang Tua/Wali<br><br><br><br>
                (...................................)
            </td>
            <td style="text-align:center;">
                Tangerang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Wali Kelas<br><br><br><br>
                ({{ $siswa->kelas->guru->nama_guru ?? '________________' }})<br>
                NIP. {{ $siswa->kelas->guru->nip ?? '-' }}
            </td>
        </tr>
    </table>
</body>

</html>