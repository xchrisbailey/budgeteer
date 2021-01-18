<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EntryStats extends Component {
  public $total_spending;
  public $total_income;

  public function __construct($entries) {
    $this->total_spending = category_totals($entries);
    $this->total_income = $this->total_spending['income'];
    $this->total_spending->forget('income');
  }

  public function render() {
    return view('components.entry-stats');
  }
}
