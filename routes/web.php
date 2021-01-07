<?php

use App\Http\Controllers\EntryController;
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

Route::get('dashboard', [EntryController::class, 'index'])
  ->middleware(['auth'])
  ->name('dashboard');

// Entry Routes
Route::group(['middleware' => 'auth', 'prefix' => 'entry'], function () {
  // Create Entry
  Route::get('create', [EntryController::class, 'create'])->name('entry.create');
  Route::post('/', [EntryController::class, 'store'])->name('entry.store');

  // Update Entry
  Route::get('{entry}/edit', [EntryController::class, 'edit'])->name('entry.edit');
  Route::put('{entry}', [EntryController::class, 'update'])->name('entry.update');

  // View Single Entry
  Route::get('{entry}', [EntryController::class, 'show'])->name('entry.show');

  // Delete Entry
  Route::delete('{entry}', [EntryController::class, 'destroy'])->name('entry.delete');
});

require __DIR__ . '/auth.php';
