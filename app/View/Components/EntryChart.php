<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EntryChart extends Component {
  public $chart;

  public function __construct($entries) {
    $totals = category_totals($entries);
    $totals->forget('income');
    $this->chart = app()
      ->chartjs->name('pieChart')
      ->type('pie')
      ->size(['width' => 'auto', 'height' => 250])
      ->labels(['want', 'need', 'savings'])
      ->datasets([
        [
          'backgroundColor' => ['#e3342f', '#ffed4a', '#3490dc'],
          'data' => [
            $totals->has('want') ? cents_to_dollars($totals['want']) : 0,
            $totals->has('need') ? cents_to_dollars($totals['need']) : 0,
            $totals->has('savings') ? cents_to_dollars($totals['savings']) : 0,
          ],
        ],
      ])
      ->options([]);
  }

  public function render() {
    return view('components.entry-chart');
  }
}
