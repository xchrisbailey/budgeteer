<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component {
  public $kind;
  public $message;

  public function __construct($kind, $message) {
    $this->kind = $kind;
    $this->message = $message;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render() {
    return view('components.alert');
  }
}
