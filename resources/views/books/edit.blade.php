@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Livro</h1>

<form action="{{ route('books.update', $book) }}" method="POST" class="max-w-lg">
  @csrf
  @method('PUT')

  <div class="mb-4">
    <label class="block font-semibold mb-1" for="title">Título:</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $book->title) }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1" for="author">Autor:</label>
    <input type="text" name="author" id="author"
           value="{{ old('author', $book->author) }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1" for="genre_id">Gênero:</label>
    <select name="genre_id" id="genre_id" required
            class="w-full border-gray-300 rounded px-3 py-2">
      <option value="">-- Selecione --</option>
      @foreach($genres as $genre)
        <option value="{{ $genre->id }}"
          @if(old('genre_id', $book->genre_id) == $genre->id) selected @endif>
          {{ $genre->name }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1" for="registry_number">Nº de Registro:</label>
    <input type="text" name="registry_number" id="registry_number"
           value="{{ old('registry_number', $book->registry_number) }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <div class="mb-4">
    <label class="block font-semibold mb-1" for="status">Status:</label>
    <select name="status" id="status" class="w-full border-gray-300 rounded px-3 py-2">
      <option value="Disponível"
        @if(old('status', $book->status) == 'Disponível') selected @endif>Disponível</option>
      <option value="Emprestado"
        @if(old('status', $book->status) == 'Emprestado') selected @endif>Emprestado</option>
    </select>
  </div>

  <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">
    Atualizar
  </button>
  <a href="{{ route('books.index') }}" class="ml-2 text-gray-800 hover:underline">Cancelar</a>
</form>
@endsection
