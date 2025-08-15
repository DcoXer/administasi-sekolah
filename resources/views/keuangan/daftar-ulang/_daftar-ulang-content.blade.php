<div class="py-10 bg-gray-100 w-full max-w-6xl flex justify-center items-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white rounded-2xl shadow-lg p-10 border relative flex flex-col gap-6">

            {{-- Watermark --}}
            <img src="{{ asset('images/logo-madrasah.png') }}"
                class="absolute opacity-5 w-2/3 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0" />

            {{-- Header --}}
            <div class="flex items-center justify-between relative z-10">
                <table style="width:80%; border-bottom:2px solid black; padding-bottom:10px; margin-bottom:15px;">
                    <tr>
                        <td style="width:25%; text-align:center;" class="py-2">
                            <img src="{{ asset('images/logo-madrasah.png') }}" style="height:25%;">
                        </td>
                        <td style="text-align:center; font-family:'Times New Roman', serif;">
                            <div style="font-size:11pt; font-weight:bold; color:#013C40;">YAYASAN PONDOK PESANTREN DARUL HASAN</div>
                            <div style="font-size:6pt;">Akte Notaris No. 04 Tanggal 08 Februari 2000, Saifuddin Arief S.H., M.H.</div>
                            <div style="font-size:11pt; font-weight:bold; color:#013C40;">MADRASAH IBTIDAIYAH DARUL HASAN</div>
                            <div style="font-size:6pt;">
                                Jl. Sipon Kel. Cipondoh Makmur, Kec. Cipondoh, Kota Tangerang<br>
                                Banten 15148 Indonesia Telp. 021 - 5575 4003
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="text-right">
                    <h2 class="text-sm font-semibold uppercase">Bukti Pembayaran Daftar Ulang</h2>
                    <p class="text-xs text-gray-500">Tanggal Cetak: {{ now()->format('d M Y') }}</p>
                </div>
            </div>

            {{-- Konten Utama --}}
            <div class="flex justify-between items-start gap-10 relative z-10">
                <div class="grid grid-cols-2 gap-x-10 gap-y-2 text-xs w-2/3">
                    <div><strong>Nama Siswa</strong></div>
                    <div>: {{ $buktiDaftarUlang->siswa->nama }}</div>
                    <div><strong>NISN</strong></div>
                    <div>: {{ $buktiDaftarUlang->siswa->nisn }}</div>
                    <div><strong>Kelas</strong></div>
                    <div>: {{ $buktiDaftarUlang->siswa->kelas }}</div>
                    <div><strong>Bulan/Tahun</strong></div>
                    <div>: {{ $buktiDaftarUlang->tahun_ajaran }}</div>
                    <div><strong>Jumlah</strong></div>
                    <div>: Rp {{ number_format($buktiDaftarUlang->nominal, 0, ',', '.') }}</div>
                    <div><strong>Status</strong></div>
                    <div>:
                        <span class="px-2 py-1 rounded text-white {{ $buktiDaftarUlang->status == 'sudah_bayar' ? 'bg-green-600' : 'bg-red-600' }}">
                            {{ ucfirst($buktiDaftarUlang->status) }}
                        </span>
                    </div>
                    <div><strong>Tanggal Bayar</strong></div>
                    <div>: {{ \Carbon\Carbon::parse($buktiDaftarUlang->tanggal_bayar)->format('d M Y') }}</div>
                </div>

                {{-- QR & TTD --}}
                <div class="text-center text-xs w-1/3">
                    <p>Staff Tata Usaha</p>
                    <img src="{{ $qrCodeBase64 }}" class="w-24 mx-auto my-3">
                    <p class="font-semibold mt-2">Putri Amalia, S.Os</p>
                </div>
            </div>
        </div>
    </div>
</div>