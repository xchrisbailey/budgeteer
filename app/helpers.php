<?php

use App\Models\User;

if (!function_exists("cents_to_dollars")) {
  function cents_to_dollars($cents) {
    return number_format($cents / 100, 2, ".", "");
  }
}

if (!function_exists("dollars_to_cents")) {
  function dollars_to_cents($dollars) {
    return (int) ((float) preg_replace("/[^0-9.]/", "", $dollars) * 100);
  }
}

if (!function_exists("current_user")) {
  function current_user() {
    return User::find(auth()->user()->id);
  }
}

if (!function_exists("category_totals")) {
  function category_totals($entries) {
    return $entries->groupBy("category")->map(function ($item, $key) {
      return $key = $item->sum("amount");
    }, []);
  }
}

if (!function_exists("stat_bar_width")) {
  function stat_bar_width($amount, $total = 0) {
    $percent = intval(($amount / $total) * 100);
    switch (true) {
      case $percent <= 16:
        return "w-1/6";
        break;
      case $percent <= 20:
        return "w-1/5";
        break;
      case $percent <= 25:
        return "w-1/4";
        break;
      case $percent <= 33:
        return "w-1/3";
        break;
      case $percent <= 40:
        return "w-2/5";
        break;
      case $percent <= 50:
        return "w-1/2";
        break;
      case $percent <= 60:
        return "w-3/5";
        break;
      case $percent <= 66:
        return "w-2/3";
        break;
      case $percent <= 75:
        return "w-3/4";
        break;
      case $percent <= 80:
        return "w-4/5";
        break;
      case $percent <= 85:
        return "w-5/6";
        break;
      default:
        return "w-full";
        break;
    }
  }
}
