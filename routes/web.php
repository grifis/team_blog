<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\AnswerController;

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
    
           //question関連
    Route::get('/questions/index', [QuestionController::class, 'index'])->name('question.index');
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit']);
    Route::get('/questions/{question}', [QuestionController::class, 'show']);
    Route::post('/answers/{question}', [AnswerController::class, 'store']);
    Route::put('/questions/{question}', [QuestionController::class, 'update']);
    
    Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

});

require __DIR__.'/auth.php';
