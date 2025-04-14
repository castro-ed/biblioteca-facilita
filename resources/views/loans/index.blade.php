@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Gerenciar Empréstimos</h1>

<a href="{{ route('loans.create') }}" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700">+ Novo Empréstimo</a>

<table class="w-full mt-4 bg-white shadow-md rounded overflow-hidden">
  <thead class="bg-gray-200">
    <tr>
      <th class="px-4 py-2 text-left">Usuário</th>
      <th class="px-4 py-2 text-left">Livro</th>
      <th class="px-4 py-2 text-center">Devolver até</th>
      <th class="px-4 py-2 text-center">Status</th>
      <th class="px-4 py-2 text-center">Ações</th>
    </tr>
  </thead>
  <tbody>
    @forelse($loans as $loan)
      @php
        $isOverdue = $loan->status === 'Atrasado' ||
                     ($loan->status === 'Ativo' && \Carbon\Carbon::parse($loan->due_date)->isPast());
        $rowClass = $isOverdue ? 'bg-red-50' : '';
      @endphp
      <tr class="border-b {{ $rowClass }}">
        <td class="px-4 py-2">{{ $loan->user->name }}</td>
        <td class="px-4 py-2">{{ $loan->book->title }}</td>
        <td class="px-4 py-2 text-center">{{ \Carbon\Carbon::parse($loan->due_date)->format('d/m/Y') }}</td>
        <td class="px-4 py-2 text-center">
          @if($loan->status === 'Ativo')
            <span class="text-blue-600 font-semibold">{{ $loan->status }}</span>
          @elseif($loan->status === 'Devolvido')
            <span class="text-green-600 font-semibold">{{ $loan->status }}</span>
          @else
            <span class="text-red-600 font-semibold">Atrasado</span>
          @endif
        </td>
        <td class="px-4 py-2 text-center">
          @if($loan->status !== 'Devolvido')
            <form action="{{ route('loans.returned', $loan) }}" method="POST" class="inline">
              @csrf
              @method('PATCH')
              <button type="submit" class="text-gray-800 bg-gray-200 px-2 py-1 rounded hover:bg-gray-300"
                      onclick="return confirm('Marcar este empréstimo como devolvido?')">
                Devolver
              </button>
            </form>
          @endif

          @if($loan->status === 'Ativo')
            <form action="{{ route('loans.late', $loan) }}" method="POST" class="inline">
              @csrf
              @method('PATCH')
              <button type="submit" class="text-yellow-800 bg-yellow-100 px-2 py-1 rounded hover:bg-yellow-200"
                      onclick="return confirm('Marcar este empréstimo como atrasado?')">
                Marcar Atrasado
              </button>
            </form>
          @endif

          <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline"
                    onclick="return confirm('Excluir este registro de empréstimo?')">
              Excluir
            </button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="px-4 py-2 text-center text-gray-500">Nenhum empréstimo registrado.</td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
