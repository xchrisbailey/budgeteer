<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component {
  public $kind;
  public $message;

  public function __construct($kind, $message) {
    $this->kind = $kind;
    $this->message = $message;
  }

  public function render() {
    return view("components.alert");
  }
}
