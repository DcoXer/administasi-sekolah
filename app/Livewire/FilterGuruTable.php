<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Guru;

class FilterGuruTable extends Component
{
    use WithPagination;

    public $search = '';
    public $mapel = '';

    protected $paginationTheme = 'tailwind';
    protected $updatesQueryString = ['search', 'mapel', 'page'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingMapel()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Guru::query();

        if (!empty($this->mapel)) {
            $query->where('mapel', $this->mapel);
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', "%{$this->search}%")
                    ->orWhere('nip', 'like', "%{$this->search}%");
            });
        }

        $gurus = $query->orderBy('nama')->paginate(10);
        $mapelList = Guru::select('mapel')->distinct()->orderBy('mapel')->pluck('mapel');

        return view('livewire.filter-guru-table', [
            'gurus' => $gurus,
            'mapelList' => $mapelList,
        ]);
    }
}
