<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
{
    // Contoh dummy data, nanti bisa ambil dari database
    $totalPembayaranLunas = 105000000;
    $totalPembayaranBelumLunas = 15000000;
    $siswaBelumLunas = 20;
    $siswaLunas = 120;
    $totalSiswa = 240;

    return view('keuangan.dashboard', compact('totalPembayaranLunas', 'totalPembayaranBelumLunas', 'siswaLunas', 'siswaBelumLunas', 'totalSiswa'));
}

}
