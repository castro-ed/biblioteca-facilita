@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Registrar Empréstimo</h1>

<form action="{{ route('loans.store') }}" method="POST" class="max-w-lg">
  @csrf
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="user_id">Usuário:</label>
    <select name="user_id" id="user_id" required class="w-full border-gray-300 rounded px-3 py-2">
      <option value="">-- Selecione o Usuário --</option>
      @foreach($users as $user)
        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
          {{ $user->name }} ({{ $user->registration_number }})
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="book_id">Livro:</label>
    <select name="book_id" id="book_id" required class="w-full border-gray-300 rounded px-3 py-2">
      <option value="">-- Selecione o Livro --</option>
      @foreach($books as $book)
        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
          {{ $book->title }} ({{ $book->author }})
        </option>
      @endforeach
    </select>
    @if($books->isEmpty())
      <p class="text-red-600 text-sm mt-1">**Nenhum livro disponível para empréstimo.**</p>
    @endif
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="due_date">Data de Devolução:</label>
    <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">Salvar Empréstimo</button>
  <a href="{{ route('loans.index') }}" class="ml-2 text-gray-800 hover:underline">Cancelar</a>
</form>
@endsection
