<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchSimple extends Component
{
    public $searchModel;
    public $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($searchModel = 'search', $placeholder = 'Cari...')
    {
        $this->searchModel = $searchModel;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.search-simple');
    }
}

