@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Gerenciar Usuários</h1>

<a href="{{ route('users.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">+ Novo Usuário</a>

<table class="w-full mt-4 bg-white shadow-md rounded overflow-hidden">
  <thead class="bg-gray-200">
    <tr>
      <th class="px-4 py-2 text-left">Nome</th>
      <th class="px-4 py-2 text-left">Email</th>
      <th class="px-4 py-2 text-left">Nº Cadastro</th>
      <th class="px-4 py-2">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr class="border-b">
      <td class="px-4 py-2">{{ $user->name }}</td>
      <td class="px-4 py-2">{{ $user->email }}</td>
      <td class="px-4 py-2">{{ $user->registration_number }}</td>
      <td class="px-4 py-2 text-center">
        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Editar</a>
        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:underline"
                  onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach

    @if($users->isEmpty())
    <tr>
      <td colspan="4" class="px-4 py-2 text-center text-gray-500">Nenhum usuário cadastrado.</td>
    </tr>
    @endif
  </tbody>
</table>
@endsection
