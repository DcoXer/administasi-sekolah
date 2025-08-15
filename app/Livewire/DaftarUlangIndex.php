<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PembayaranDaftarUlang;

class DaftarUlangIndex extends Component
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
        $pembayaran = PembayaranDaftarUlang::with('siswa')
            ->when($this->search, function ($query) {
                $query->whereHas('siswa', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.daftar-ulang-index', [
            'pembayaran' => $pembayaran,
            'jumlahSudah' => PembayaranDaftarUlang::where('status', 'sudah_bayar')->count(),
            'jumlahBelum' => PembayaranDaftarUlang::where('status', 'belum_bayar')->count(),
            'totalSudah' => PembayaranDaftarUlang::where('status', 'sudah_bayar')->sum('nominal'),
            'totalBelum' => PembayaranDaftarUlang::where('status', 'belum_bayar')->sum('nominal'),
        ]);
    }
}
