<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MutasiSiswa;

class MutasiSiswaTable extends Component
{
    protected $listeners = ['mutasi-updated' => 'render']; // refresh saat ada pengajuan baru

    public function render()
    {
        return view('livewire.mutasi-siswa-table', [
            'mutasi' => MutasiSiswa::with('siswa')->latest()->get(),
        ]);
    }
}
