<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::group(['middleware' => 'auth', 'prefix' => 'entry'], function () {
    // view single entry
    Route::get('create', [EntryController::class, 'show'])->name('entry.show');

    // create entry
    Route::get('create', [EntryController::class, 'create'])->name('entry.create');
    Route::post('entry', [EntryController::class, 'store'])->name('entry.store');

    // edit entry
    Route::get('{entry}/edit', [EntryController::class, 'edit'])->name('entry.edit');
    Route::put('{entry}', [EntryController::class, 'update'])->name('entry.update');

    // delete entry
    Route::delete('{entry}', [EntryController::class, 'destroy'])->name('entry.destroy');
});

require __DIR__ . '/auth.php';
