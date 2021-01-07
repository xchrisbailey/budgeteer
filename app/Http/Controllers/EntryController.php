<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class EntryController extends Controller {
  public function index(Request $request) {
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

    return view('user.dashboard', compact('entries'));
  }
  public function show(Entry $entry) {
    if (!Gate::allows('edit', $entry)) {
      return redirect('/dashboard')->withErrors(['You are not authorized to view this entry']);
    }
    return view('entry.show', ['entry' => $entry]);
  }

  public function create() {
    return view('entry.create');
  }

  public function store(Request $request) {
    /* $entry = current_user() */
    /*   ->entries() */
    /*   ->new($this->validateAndPrepareEntry()); */
    $entry = new Entry($this->validateAndPrepareEntry());
    $entry->year = (int) date('Y', strtotime($entry['spend_date']));
    $entry->month = (int) date('m', strtotime($entry['spend_date']));
    $entry->user_id = current_user()->id;
    $entry->save();

    $request->session()->flash('message', 'Entry Added');
    return redirect('/dashboard');
  }

  public function edit(Entry $entry) {
    if (!Gate::allows('edit', $entry)) {
      return redirect('/dashboard')->withErrors(['You are not authorized to edit this entry']);
    }

    return view('entry.edit', ['entry' => $entry]);
  }

  public function update(Entry $entry, Request $request) {
    $this->authorize('update', $entry);
    $entry->update($this->validateAndPrepareEntry());
    $request->session()->flash('message', 'Entry Updated');
    return redirect('/dashboard');
  }

  public function destroy(Entry $entry) {
    $this->authorize('delete', $entry);
    $entry->delete();
    return redirect()->back();
  }

  protected function validateAndPrepareEntry() {
    $entry = request()->validate([
      'amount' => 'required|numeric|gt:0',
      'description' => 'required',
      'category' => 'required',
      'spend_date' => 'required',
    ]);

    $entry['amount'] = dollars_to_cents($entry['amount']);
    $entry['spend_date'] = Carbon::parse($entry['spend_date']);
    return $entry;
  }
}
