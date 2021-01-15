<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EntryChart extends Component {
  public $chart;

  public function __construct($entries) {
    $totals = category_totals($entries);
    $this->chart = app()
      ->chartjs->name("pieChart")
      ->type("pie")
      ->size(["width" => "auto", "height" => 250])
      ->labels(["want", "need", "savings", "income"])
      ->datasets([
        [
          "backgroundColor" => ["#e3342f", "#ffed4a", "#3490dc", "#38c172"],
          "data" => [
            $totals->has("want") ? cents_to_dollars($totals["want"]) : 0,
            $totals->has("need") ? cents_to_dollars($totals["need"]) : 0,
            $totals->has("savings") ? cents_to_dollars($totals["savings"]) : 0,
            $totals->has("income") ? cents_to_dollars($totals["income"]) : 0,
          ],
        ],
      ])
      ->options([]);
  }

  public function render() {
    return view("components.entry-chart");
  }
}
