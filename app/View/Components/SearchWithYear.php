<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchWithYear extends Component
{
    public $searchModel;
    public $placeholder;
    public $tahunAjaran;

    /**
     * Create a new component instance.
     */
    public function __construct($searchModel = 'search', $placeholder = 'Cari...', $tahunAjaran = null)
    {
        $this->searchModel = $searchModel;
        $this->placeholder = $placeholder;
        $this->tahunAjaran = $tahunAjaran ?? date('Y') . '/' . (date('Y') + 1);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.search-with-year');
    }
}
