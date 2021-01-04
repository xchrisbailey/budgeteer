<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller {
    public function show(Entry $entry) {
        return view('entry.show', ['entry' => $entry]);
    }

    public function create() {
        return view('entry.create');
    }

    public function store(Request $request) {
        current_user()
            ->entries()
            ->create($this->validateAndPrepareEntry());
        $request->session()->flash('message', 'Entry Added');
        return redirect('/dashboard');
    }

    public function edit(Entry $entry) {
        return view('entry.edit', ['entry' => $entry]);
    }

    public function update(Entry $entry, Request $request) {
        $entry->update($this->validateAndPrepareEntry());
        $request->session()->flash('message', 'Entry Updated');
        return redirect('/dashboard');
    }

    public function destroy(Entry $entry) {
        $entry->delete();
        return redirect()->back();
    }

    protected function validateAndPrepareEntry() {
        $entry = request()->validate([
            'amount' => 'required|numberic|gt:0',
            'description' => 'required',
            'category' => 'required',
        ]);

        $entry['amount'] = dollars_to_cents($entry['amount']);
        return $entry;
    }
}
