<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard - página inicial com dados da biblioteca
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Usuários (CRUD)
Route::resource('users', UserController::class);

// Livros (CRUD)
Route::resource('books', BookController::class);

// Listar empréstimos
Route::get('loans', [LoanController::class, 'index'])->name('loans.index');

// Form novo empréstimo e ação de salvar
Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('loans', [LoanController::class, 'store'])->name('loans.store');

// Marcar devolvido e atrasado
Route::patch('loans/{loan}/returned', [LoanController::class, 'markReturned'])->name('loans.returned');
Route::patch('loans/{loan}/late', [LoanController::class, 'markLate'])->name('loans.late');

// Excluir empréstimo
Route::delete('loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');

// Gerenciar gêneros
Route::resource('genres', GenreController::class);



