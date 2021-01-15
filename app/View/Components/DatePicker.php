<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatePicker extends Component {
  public function __construct() {
    //
  }

  public function render() {
    return view("components.date-picker");
  }
}
