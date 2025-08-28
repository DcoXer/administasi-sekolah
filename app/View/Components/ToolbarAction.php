<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ToolbarAction extends Component
{
    public $createRoute;
    public $exportRoute;
    public $importRoute;

    public function __construct($createRoute = null, $exportRoute = null, $importRoute = null)
    {
        $this->createRoute = $createRoute;
        $this->exportRoute = $exportRoute;
        $this->importRoute = $importRoute;
    }

    public function render()
    {
        return view('components.toolbar-action');
    }
}
