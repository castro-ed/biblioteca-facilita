@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6 text-indigo-700">Cadastrar Gênero</h1>

    <form action="{{ route('genres.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-semibold">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="w-full border-gray-300 rounded px-3 py-2" />
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Salvar</button>
        <a href="{{ route('genres.index') }}" class="ml-2 text-gray-700 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
