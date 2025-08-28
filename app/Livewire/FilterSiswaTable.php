<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;

class FilterSiswaTable extends Component
{
    use WithPagination;

    public $search = '';
    public $kelas = '';

    protected $paginationTheme = 'tailwind';
    protected $updatesQueryString = ['search', 'kelas', 'page'];

    public function updatingSearch($value)
    {
        $this->resetPage();
    }
    public function updatingKelas($value)
    {
        $this->resetPage();
    }

    public function render()
    {
        logger('DEBUG FILTER KELAS: ' . $this->kelas);
        logger('DEBUG FILTER SEARCH: ' . $this->search);

        $query = Siswa::query();

        if (trim($this->kelas) !== '') {
            $query->where('kelas', $this->kelas);
        }

        if (trim($this->search) !== '') {
            $query->where(function ($q) {
                $term = "%{$this->search}%";
                $q->where('nama', 'like', $term)
                    ->orWhere('nisn', 'like', $term)
                    ->orWhere('nik', 'like', $term);
            });
        }

        // Pagination & urut nama
        $siswas = $query->orderBy('nama')->paginate(10);

        // Ambil Data Kelas Untuk Dropdown
        $kelasList = Siswa::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('livewire.filter-siswa-table', [
            'siswas' => $siswas,
            'kelasList' => $kelasList,
        ]);
    }
}
