<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('cents_to_dollars')) {
    function cents_to_dollars($cents) {
        return number_format($cents / 100, 2, '.', '');
    }
}

if (!function_exists('dollars_to_cents')) {
    function dollars_to_cents($dollars) {
        return (int) ((float) preg_replace('/[^0-9.]/', '', $dollars) * 100);
    }
}

if (!function_exists('current_user')) {
    function current_user() {
        return User::find(auth()->user()->id);
    }
}
