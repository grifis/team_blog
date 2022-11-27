<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroduceController;
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
    Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    //breeze関連ここまで
});

require __DIR__.'/auth.php';
