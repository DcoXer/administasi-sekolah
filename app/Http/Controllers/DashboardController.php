<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PembayaranDaftarUlang;
use App\Models\PembayaranSpp;
use App\Models\MutasiSiswa;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\RaportPts;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();

        // ================= STAFF KEUANGAN =================
        if ($user->role === 'staff_keuangan') {
            // Jumlah siswa per kelas
            $siswaPerKelas = Kelas::withCount('siswa')->pluck('siswa_count', 'nama_kelas');

            // Daftar Ulang
            $duSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->count();
            $duBelum = $totalSiswa - $duSudah;
            $duTotalSudah = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');
            $duChart = collect([
                ['status' => 'Sudah Bayar', 'jumlah' => $duSudah],
                ['status' => 'Belum Bayar', 'jumlah' => $duBelum],
            ]);

            // SPP
            $sppSudah = PembayaranSpp::where('status', 'sudah')->count();
            $sppBelum = $totalSiswa - $sppSudah;
            $sppTotalSudah = PembayaranSpp::where('status', 'sudah')->sum('jumlah');

            // Grafik SPP per bulan
            $sppPerBulanRaw = PembayaranSpp::selectRaw('MONTH(tanggal_bayar) as bulan, SUM(jumlah) as total')
                ->where('status', 'sudah')
                ->groupByRaw('MONTH(tanggal_bayar)')
                ->orderByRaw('MONTH(tanggal_bayar)')
                ->pluck('total', 'bulan');

            $bulanIndo = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $sppLabels = [];
            $sppData = [];
            foreach ($bulanIndo as $no => $nama) {
                $sppLabels[] = $nama;
                $sppData[] = $sppPerBulanRaw[$no] ?? 0;
            }

            return view('dashboard', compact(
                'user',
                'duSudah',
                'duBelum',
                'duTotalSudah',
                'duChart',
                'sppSudah',
                'sppBelum',
                'sppTotalSudah',
                'sppLabels',
                'sppData',
                'totalSiswa',
                'siswaPerKelas'
            ));
        }

        // ================= OPERATOR =================
        if ($user->role === 'operator') {
            $jumlahSiswa = Kelas::withCount('siswas')->pluck('siswas_count', 'nama_kelas')->toArray();
            $jumlahGuru = Mapel::withCount('guru')->pluck('guru_count', 'nama_mapel')->toArray();

            return view('dashboard', compact(
                'user',
                'totalSiswa',
                'jumlahSiswa',
                'jumlahGuru',
                'totalGuru'
            ));
        }

        // ================= KEPALA SEKOLAH =================
        if ($user->role === 'kepala_madrasah') {
            $totalMutasi = MutasiSiswa::count();
            $totalMutasiMenunggu = MutasiSiswa::where('status', 'pending')->count();
            $totalMutasiDisetujui = MutasiSiswa::where('status', 'disetujui')->count();
            $totalMutasiDitolak = MutasiSiswa::where('status', 'ditolak')->count();

            $grafikKelas = Kelas::withCount('siswa')->pluck('siswa_count', 'nama_kelas');
            $totalSPPSudah = PembayaranSpp::where('status', 'sudah')->sum('jumlah');
            $totalDU = PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal');

            return view('dashboard', compact(
                'user',
                'totalMutasi',
                'totalMutasiMenunggu',
                'totalMutasiDisetujui',
                'totalMutasiDitolak',
                'totalSiswa',
                'totalGuru',
                'totalSPPSudah',
                'totalDU',
                'grafikKelas'
            ));
        }

        // ================= WALI KELAS =================
        if ($user->role === 'wali_kelas') {
            $wali = Guru::where('user_id', $user->id)->first();
            $kelas = $wali ? $wali->kelas : null;

            $jumlahSiswa = $kelas ? $kelas->siswa()->count() : 0;
            $jumlahRaport = $kelas ? RaportPts::whereIn('siswa_id', $kelas->siswa->pluck('id'))->count() : 0;

            return view('dashboard', compact(
                'user',
                'kelas',
                'jumlahSiswa',
                'jumlahRaport'
            ));
        }

        // ================= GURU BIDANG =================
        if ($user->role === 'guru_bidang') {
            $guru = Guru::where('user_id', $user->id)->first();
            $mapel = $guru ? $guru->mapel : null;

            $jumlahKelas = Kelas::count();
            $jumlahNilai = $mapel ? $mapel->nilai()->count() : 0;

            return view('dashboard', compact(
                'user',
                'mapel',
                'jumlahKelas',
                'jumlahNilai'
            ));
        }

        // ================= DEFAULT =================
        return view('dashboard', compact('user', 'totalSiswa', 'totalGuru'));
    }
}
