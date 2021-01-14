<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datePicker extends Component {
  public function __construct() {
    //
  }

  public function render() {
    return view('components.date-picker');
  }
}
