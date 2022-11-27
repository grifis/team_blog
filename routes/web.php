<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\CommentsController;

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

/*ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [IntroduceController::class, 'index'])->name('introduce');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});

Route::get('/notes/index', [SummaryController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [SummaryController::class, 'create'])->name('notes.create');
Route::get('/notes/{note}', [SummaryController::class, 'show'])->name('notes.show');
Route::get('/notes_categories/{Notecategory}', [SummaryController::class, 'category_index'])->name('notes.notecategory');
Route::post('/notes/index', [SummaryController::class, 'store'])->name('notes.store');
Route::post('/notes/{note}', [CommentsController::class, 'store'])->name('comment.store');

require __DIR__.'/auth.php';
