<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['user', 'book'])->orderBy('status')->orderBy('due_date')->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $books = Book::where('status', 'Disponível')->orderBy('title')->get();
        return view('loans.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date|after:today',
        ]);

        $book = Book::findOrFail($validated['book_id']);
        if ($book->status !== 'Disponível') {
            return redirect()->back()
                ->withErrors(['book_id' => 'Este livro não está disponível para empréstimo.'])
                ->withInput();
        }

        $loan = Loan::create([
            'user_id' => $validated['user_id'],
            'book_id' => $validated['book_id'],
            'due_date' => $validated['due_date'],
            'status'   => 'Ativo',
        ]);

        $book->update(['status' => 'Emprestado']);

        return redirect()->route('loans.index')->with('success', 'Empréstimo registrado com sucesso!');
    }

    public function markReturned(Loan $loan)
    {
        if ($loan->status !== 'Devolvido') {
            $loan->status = 'Devolvido';
            $loan->save();
            $loan->book()->update(['status' => 'Disponível']);
            return redirect()->route('loans.index')->with('success', 'Empréstimo marcado como devolvido.');
        }
        return redirect()->route('loans.index');
    }

    public function markLate(Loan $loan)
    {
        if ($loan->status === 'Ativo') {
            $loan->status = 'Atrasado';
            $loan->save();
            return redirect()->route('loans.index')->with('warning', 'Empréstimo marcado como atrasado.');
        }
        return redirect()->route('loans.index');
    }

    public function destroy(Loan $loan)
    {
        if ($loan->status !== 'Devolvido') {
            $loan->book()->update(['status' => 'Disponível']);
        }

        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Registro de empréstimo removido.');
    }
}
