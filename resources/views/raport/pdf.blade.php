<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raport - {{ $raport->siswa->nama }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; color: #111827; }
        .header { text-align: center; margin-bottom: 12px; }
        .school { font-size: 18px; font-weight: bold; }
        .meta { margin-top: 4px; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { padding: 6px 8px; border: 1px solid #d1d5db; font-size: 12px; }
        th { background: #f3f4f6; }
        .right { text-align: right; }
        .center { text-align: center; }
        .note { margin-top: 12px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="school">Sekolah Menengah Pertama Contoh</div>
        <div class="meta">Raport Semester {{ $raport->semester }} - Tahun Ajaran {{ $raport->tahun_ajaran }}</div>
    </div>

    <div>
        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $raport->siswa->nama }}</td>
                <th>NISN</th>
                <td>{{ $raport->siswa->nisn }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $raport->siswa->kelas }}</td>
                <th>Wali Kelas</th>
                <td>{{ $raport->waliKelas->nama ?? '-' }}</td>
            </tr>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Bidang Studi</th>
                    <th class="center">Tugas</th>
                    <th class="center">UTS</th>
                    <th class="center">UAS</th>
                    <th class="center">Nilai Akhir</th>
                    <th class="center">Grade</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilaiSiswa as $nilai)
                    <tr>
                        <td>{{ $nilai->guruBidang->bidang->nama_bidang }}</td>
                        <td class="center">{{ $nilai->nilai_tugas ?? '-' }}</td>
                        <td class="center">{{ $nilai->nilai_uts ?? '-' }}</td>
                        <td class="center">{{ $nilai->nilai_uas ?? '-' }}</td>
                        <td class="center">{{ $nilai->nilai_akhir ? number_format($nilai->nilai_akhir,2) : '-' }}</td>
                        <td class="center">{{ $nilai->grade ?? '-' }}</td>
                        <td>{{ $nilai->catatan_guru }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="note">
            <strong>Rata-rata Nilai:</strong> {{ number_format($raport->nilai_rata_rata, 2) }}
        </div>

        <div class="note">
            <strong>Catatan Wali Kelas:</strong>
            <div style="margin-top:4px;">{{ $raport->catatan_wali_kelas ?? '-' }}</div>
        </div>

        <div class="note">
            <strong>Catatan Kepala Sekolah:</strong>
            <div style="margin-top:4px;">{{ $raport->catatan_kepala_sekolah ?? '-' }}</div>
        </div>

        <div style="margin-top:20px; display:flex; justify-content:space-between; font-size:12px;">
            <div>
                Wali Kelas
                <div style="margin-top:40px;">__________________________</div>
            </div>
            <div class="right">
                Kepala Sekolah
                <div style="margin-top:40px;">__________________________</div>
            </div>
        </div>
    </div>
</body>
</html>
