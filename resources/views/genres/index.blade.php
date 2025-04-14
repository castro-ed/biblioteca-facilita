@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-indigo-700">Gêneros</h1>

    <a href="{{ route('genres.create') }}" class="mb-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Novo Gênero</a>

    @if($genres->isEmpty())
        <p class="text-gray-600">Nenhum gênero cadastrado ainda.</p>
    @else
    <table class="w-full bg-white rounded shadow-md overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="text-left px-4 py-2">Nome</th>
                <th class="text-center px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $genre->name }}</td>
                <td class="px-4 py-2 text-center">
                    <a href="{{ route('genres.edit', $genre) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Excluir este gênero?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
