<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\IntroduceController;

use App\Http\Controllers\AnswerController;

use App\Http\Controllers\SummaryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\QuizController;


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
Route::get("/test", [QuizController::class, "test"]);

Route::middleware('auth')->group(function () {
    Route::get('/', [IntroduceController::class, 'index'])->name('introduce');
    Route::post('/quizzes', [QuizController::class, 'store']);
    Route::get('/quizzes/index', [QuizController::class, 'index'])->name('quiz')->middleware('auth');//naviには、このルーティングをquizとして渡してる。
    Route::get('/quizzes/give', [QuizController::class, 'give']);
    Route::get('/quizzes/{quiz}', [QuizController::class, 'solve']);
    
    //breeze関連
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

    //breeze関連ここまで
});

Route::get('/notes/index', [SummaryController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [SummaryController::class, 'create'])->name('notes.create');
Route::get('/notes/{note}', [SummaryController::class, 'show'])->name('notes.show');
Route::get('/notes_categories/{Notecategory}', [SummaryController::class, 'category_index'])->name('notes.notecategory');
Route::post('/notes/index', [SummaryController::class, 'store'])->name('notes.store');
Route::post('/notes/{note}', [CommentsController::class, 'store'])->name('comment.store');

require __DIR__.'/auth.php';
