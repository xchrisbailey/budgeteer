<?php

namespace App\View\Components;

use Illuminate\View\Component;

class entryTable extends Component
{
    public $entries;

    public function __construct($entries)
    {
        $this->entries = $entries;
    }

    public function render()
    {
        return view('components.entry-table');
    }
}
