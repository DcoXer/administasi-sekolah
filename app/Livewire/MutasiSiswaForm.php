<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\MutasiSiswa;

class MutasiSiswaForm extends Component
{
    public $siswa_id;
    public $alasan;
    public $tujuan_sekolah;
    public $siswas = [];

    public function mount()
    {
        // ambil semua siswa yang belum pernah diajukan mutasi
        $mutasiSiswaIds = MutasiSiswa::pluck('siswa_id')->toArray();

        $this->siswas = Siswa::whereNotIn('id', $mutasiSiswaIds)->get();
    }

    public function submit()
    {
        $this->validate([
            'siswa_id' => 'required',
            'alasan' => 'required|string|max:255',
            'tujuan_sekolah' => 'required|string|max:255',
        ]);

        MutasiSiswa::create([
            'siswa_id' => $this->siswa_id,
            'alasan' => $this->alasan,
            'tujuan_sekolah' => $this->tujuan_sekolah,
            'status' => 'pending',
            'tanggal_pengajuan' => now(),
        ]);

        // reset input
        $this->reset(['siswa_id', 'alasan', 'tujuan_sekolah']);

        // update list siswa (biar dropdown langsung ilangin yang baru diajukan)
        $mutasiSiswaIds = MutasiSiswa::pluck('siswa_id')->toArray();
        $this->siswas = Siswa::whereNotIn('id', $mutasiSiswaIds)->get();

        session()->flash('success', 'Pengajuan mutasi berhasil dikirim!');
    }

    public function render()
    {
        return view('livewire.mutasi-siswa-form');
    }
}
