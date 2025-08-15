<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran Daftar Ulang</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 30px;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 30px 40px;
            position: relative;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.05;
            width: 350px;
            z-index: 0;
        }

        .kop-table,
        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-table td {
            vertical-align: middle;
        }

        .kop-logo {
            width: 150px;
            max-height: 150px;
        }

        .kop-text {
            text-align: center;
            font-family: 'Times New Roman', serif;
        }

        .kop-text h1 {
            margin: 0;
            font-size: 16pt;
            color: #013C40;
        }

        .kop-text h2 {
            margin: 0;
            font-size: 14pt;
            color: #013C40;
        }

        .kop-text p {
            margin: 2px 0;
            font-size: 9pt;
        }

        .info-table {
            width: 100%;
            font-size: 12pt;
            margin-top: 20px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .info-table td {
            padding: 5px 0;
        }

        .badge {
            background-color: green;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 11pt;
        }

        .footer-table td {
            vertical-align: bottom;
            font-size: 12pt;
            padding-top: 40px;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        .footer-right img {
            width: 100px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">

        {{-- Watermark --}}
        <img src="{{ public_path('images/logo-madrasah.png') }}" class="watermark" alt="Watermark">

        {{-- KOP SEKOLAH PAKAI TABEL --}}
        <table class="kop-table">
            <tr>
                <td style="width: 15%;">
                    <img src="{{ public_path('images/logo-madrasah.png') }}" alt="Logo" class="kop-logo">
                </td>
                <td class="kop-text">
                    <h1>YAYASAN PONDOK PESANTREN DARUL HASAN</h1>
                    <p>Akte Notaris No. 04 Tanggal 08 Februari 2000, Saifuddin Arief S.H., M.H.</p>
                    <h2>MADRASAH IBTIDAIYAH DARUL HASAN</h2>
                    <p>Jl. Sipon Kel. Cipondoh Makmur, Kec. Cipondoh, Kota Tangerang</p>
                    <p>Banten 15148 Indonesia Telp. 021 - 5575 4003</p>
                </td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top: 10px; margin-bottom: 20px;">

        {{-- INFO SISWA --}}
        <table class="info-table">
            <tr>
                <td style="width: 30%;"><strong>Nama Siswa</strong></td>
                <td>: {{ $buktiDaftarUlang->siswa->nama }}</td>
            </tr>
            <tr>
                <td><strong>NISN</strong></td>
                <td>: {{ $buktiDaftarUlang->siswa->nisn }}</td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td>: {{ $buktiDaftarUlang->siswa->kelas }}</td>
            </tr>
            <tr>
                <td><strong>Tahun</strong></td>
                <td>: {{ $buktiDaftarUlang->tahun }}</td>
            </tr>
            <tr>
                <td><strong>Jumlah</strong></td>
                <td>: Rp {{ number_format($buktiDaftarUlang->jumlah, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Status</strong></td>
                <td>: <span class="badge">{{ ucfirst($buktiDaftarUlang->status) }}</span></td>
            </tr>
            <tr>
                <td><strong>Tanggal Bayar</strong></td>
                <td>: {{ \Carbon\Carbon::parse($buktiDaftarUlang->tanggal_bayar)->format('d M Y') }}</td>
            </tr>
        </table>

        {{-- FOOTER PAKAI TABEL --}}
        <table class="footer-table">
            <tr>
                <td class="footer-left" style="width: 50%;">
                    <strong>Bukti Pembayaran Daftar Ulang</strong><br>
                    Tanggal Cetak: {{ now()->format('d M Y') }}
                </td>
                <td class="footer-right" style="width: 50%;">
                    <p>Staff Tata Usaha</p>
                    <img src="{{ $qrCodeBase64 }}" alt="QR Code" style="width: 100px; margin-top: 5px;">
                    <p><strong>Putri Amalia, S.Os</strong></p>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>