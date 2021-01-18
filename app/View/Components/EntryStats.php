<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EntryStats extends Component {
  public $totals;

  public function __construct($entries) {
    $this->totals = category_totals($entries);
  }

  public function render() {
    return view('components.entry-stats');
  }
}
