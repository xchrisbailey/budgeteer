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

        return view('components.user-feed', ['entries' => $entries]);
    }
}
