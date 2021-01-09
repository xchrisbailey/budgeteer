<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class EntryController extends Controller {
  public function index(Request $request) {
    if ($request->month && $request->year) {
      $month = $request->month;
      $year = $request->year;
    } else {
      $month = date('n');
      $year = date('Y');
    }

    $current_date = strtotime($year . '-' . $month . '-' . date('d'));
    $previous_date = [
      'month' => (int) date('m', strtotime('-1 month', $current_date)),
      'year' => (int) date('Y', strtotime('-1 month', $current_date)),
    ];
    $next_date = [
      'month' => (int) date('m', strtotime('+1 month', $current_date)),
      'year' => (int) date('Y', strtotime('+1 month', $current_date)),
    ];

    $entries = DB::table('entries')
      ->where('user_id', '=', current_user()->id)
      ->where('month', '=', $month)
      ->where('year', '=', $year)
      ->orderBy('spend_date', 'DESC')
      ->get();

    return view('user.dashboard', compact('entries', 'previous_date', 'next_date'));
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
