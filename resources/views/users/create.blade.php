@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Cadastrar Usuário</h1>

<form action="{{ route('users.store') }}" method="POST" class="max-w-lg">
  @csrf
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="name">Nome:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>
  <div class="mb-4">
    <label class="block font-semibold mb-1" for="registration_number">Número de Cadastro:</label>
    <input type="text" name="registration_number" id="registration_number" value="{{ old('registration_number') }}" required
           class="w-full border-gray-300 rounded px-3 py-2" />
  </div>

  <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">
    Salvar
  </button>
  <a href="{{ route('users.index') }}" class="ml-2 text-gray-800 hover:underline">Cancelar</a>
</form>
@endsection
