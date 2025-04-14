@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Cadastrar Livro</h1>

<form action="{{ route('books.store') }}" method="POST" class="max-w-lg">
  @csrf
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="title">Título:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="author">Autor:</label>
    <input type="text" name="author" id="author" value="{{ old('author') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="genre_id">Gênero:</label>
    <select name="genre_id" id="genre_id" required class="w-full border-gray-300 rounded px-3 py-2">
      <option value="">-- Selecione --</option>
      @foreach($genres as $genre)
        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
          {{ $genre->name }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="registry_number">Nº de Registro:</label>
    <input type="text" name="registry_number" id="registry_number" value="{{ old('registry_number') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">Salvar</button>
  <a href="{{ route('books.index') }}" class="ml-2 text-gray-800 hover:underline">Cancelar</a>
</form>
@endsection
