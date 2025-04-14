<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name')->get();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:genres,name|max:255',
        ]);

        Genre::create($validated);

        return redirect()->route('genres.index')->with('success', 'Gênero cadastrado com sucesso!');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update($validated);

        return redirect()->route('genres.index')->with('success', 'Gênero atualizado com sucesso!');
    }

    public function destroy(Genre $genre)
    {
        // Se quiser impedir exclusão se houver livros associados:
        if ($genre->books()->exists()) {
            return redirect()->route('genres.index')
                ->withErrors(['error' => 'Não é possível excluir um gênero que possui livros associados.']);
        }

        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Gênero excluído com sucesso!');
    }
}
