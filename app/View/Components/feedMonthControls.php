<?php

namespace App\View\Components;

use Illuminate\View\Component;

class feedMonthControls extends Component {
  public $currentMonth;
  public $currentYear;
  public $nextDate;
  public $previousDate;

  public function __construct($currentMonth, $currentYear, $nextDate, $previousDate) {
    $this->currentMonth = $currentMonth;
    $this->currentYear = $currentYear;
    $this->nextDate = $nextDate;
    $this->previousDate = $previousDate;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render() {
    return view('components.feed-month-controls');
  }
}
