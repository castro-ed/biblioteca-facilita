<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $availableBooks = Book::where('status', 'Disponível')->count();
        $loanedBooks = Book::where('status', 'Emprestado')->count();
        $totalUsers = User::count();
        $activeLoans = Loan::where('status', 'Ativo')->count();
        $returnedLoans = Loan::where('status', 'Devolvido')->count();
        $lateLoans = Loan::where('status', 'Atrasado')->count();

        return view('dashboard', compact(
            'totalBooks', 'availableBooks', 'loanedBooks',
            'totalUsers', 'activeLoans', 'returnedLoans', 'lateLoans'
        ));
    }
}
