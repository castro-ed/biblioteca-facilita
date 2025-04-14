@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Gerenciar Livros</h1>

<a href="{{ route('books.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">+ Novo Livro</a>

<table class="w-full mt-4 bg-white shadow-md rounded overflow-hidden">
  <thead class="bg-gray-200">
    <tr>
      <th class="px-4 py-2 text-left">Título</th>
      <th class="px-4 py-2 text-left">Autor</th>
      <th class="px-4 py-2 text-left">Gênero</th>
      <th class="px-4 py-2 text-center">Status</th>
      <th class="px-4 py-2">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($books as $book)
    <tr class="border-b @if($book->status === 'Emprestado') bg-yellow-50 @endif">
      <td class="px-4 py-2">{{ $book->title }}</td>
      <td class="px-4 py-2">{{ $book->author }}</td>
      <td class="px-4 py-2">{{ $book->genre->name ?? '-' }}</td>
      <td class="px-4 py-2 text-center">
        @if($book->status === 'Disponível')
          <span class="text-green-600 font-semibold">{{ $book->status }}</span>
        @else
          <span class="text-red-600 font-semibold">{{ $book->status }}</span>
        @endif
      </td>
      <td class="px-4 py-2 text-center">
        <a href="{{ route('books.edit', $book) }}" class="text-blue-600 hover:underline">Editar</a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:underline"
                  onclick="return confirm('Excluir este livro?')">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach

    @if($books->isEmpty())
    <tr>
      <td colspan="5" class="px-4 py-2 text-center text-gray-500">Nenhum livro cadastrado.</td>
    </tr>
    @endif
  </tbody>
</table>
@endsection
