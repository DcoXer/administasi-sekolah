<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MutasiSiswa;

class MutasiTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $mutasi = MutasiSiswa::with('siswa')
            ->whereHas('siswa', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.mutasi-approval-table', compact('mutasi'));
    }

    public function approve($id)
    {
        $mutasi = MutasiSiswa::find($id);
        if ($mutasi) {
            $mutasi->status = 'disetujui';
            $mutasi->save();
        }
    }

    public function reject($id)
    {
        $mutasi = MutasiSiswa::find($id);
        if ($mutasi) {
            $mutasi->status = 'ditolak';
            $mutasi->save();
        }
    }
}
