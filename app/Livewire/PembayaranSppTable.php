<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PembayaranSpp;
use App\Exports\PembayaranSppExport;
use App\Imports\PembayaranSppImport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranSppTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = PembayaranSpp::with('siswa')
            ->when($this->search, fn($q) =>
                $q->whereHas('siswa', fn($s) =>
                    $s->where('nama', 'like', '%'.$this->search.'%')
                )
            )
            ->latest();

        return view('livewire.pembayaran-spp-table', [
            'pembayaran'   => $query->paginate(10),
            'jumlahSudah'  => (clone $query)->where('status', 'sudah')->count(),
            'jumlahBelum'  => (clone $query)->where('status', 'belum')->count(),
            'totalSudah'   => (clone $query)->where('status', 'sudah')->sum('jumlah'),
            'totalBelum'   => (clone $query)->where('status', 'belum')->sum('jumlah'),
        ]);
    }
}
