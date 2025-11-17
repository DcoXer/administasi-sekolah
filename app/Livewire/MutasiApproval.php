<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MutasiSiswa;

class MutasiApproval extends Component
{
    public $selectedId, $keterangan_penolakan;

    public function approve($id)
    {
        $data = MutasiSiswa::find($id);
        $data->update([
            'status' => 'disetujui',
            'tanggal_persetujuan' => now(),
        ]);
    }

    public function reject($id)
    {
        $data = MutasiSiswa::find($id);
        $data->update([
            'status' => 'ditolak',
            'keterangan_penolakan' => $this->keterangan_penolakan,
            'tanggal_persetujuan' => now(),
        ]);
        $this->reset('keterangan_penolakan');
    }

    public function render()
    {
        return view('livewire.mutasi-approval', [
            'mutasi' => MutasiSiswa::with('siswa')->latest()->get(),
        ]);
    }
}
