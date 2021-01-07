<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class userFeed extends Component {
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render() {
    $entries = DB::table('entries')
      ->where('user_id', '=', current_user()->id)
      ->orderBy('spend_date', 'DESC')
      ->get();

    $totals = $entries->groupBy('category')->map(function ($item, $key) {
      return $key = $item->sum('amount');
    }, []);

    $chart = app()
      ->chartjs->name('pieChart')
      ->type('pie')
      ->size(['width' => 'auto', 'height' => 250])
      ->labels(['want', 'need', 'savings', 'income'])
      ->datasets([
        [
          'backgroundColor' => ['#e3342f', '#ffed4a', '#3490dc', '#38c172'],
          'data' => [
            $totals->has('want') ? cents_to_dollars($totals['want']) : 0,
            $totals->has('need') ? cents_to_dollars($totals['need']) : 0,
            $totals->has('savings') ? cents_to_dollars($totals['savings']) : 0,
            $totals->has('income') ? cents_to_dollars($totals['income']) : 0,
          ],
        ],
      ])
      ->options([]);

    return view('components.user-feed', compact('entries', 'chart', 'totals'));
  }
}
