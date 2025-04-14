<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('genre')->orderBy('title')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'registry_number' => 'required|string|unique:books,registry_number',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $validated['status'] = 'Disponível';

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(Book $book)
    {
        $genres = Genre::orderBy('name')->get();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'registry_number' => 'required|string|unique:books,registry_number,' . $book->id,
            'genre_id' => 'required|exists:genres,id',
            'status' => 'required|in:Disponível,Emprestado',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }
}
