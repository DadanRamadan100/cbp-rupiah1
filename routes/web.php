
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JelajahController;

Route::get('/', [JelajahController::class, 'home'])->name('home');

Route::get('/scan', [JelajahController::class, 'scan'])->name('scan');

Route::get('/belajar', [JelajahController::class, 'learning'])->name('learning');

Route::get('/kuis', [JelajahController::class, 'quiz'])->name('quiz');

Route::post('/kuis', [JelajahController::class, 'submitQuiz'])->name('quiz.submit');
