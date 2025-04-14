@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-indigo-800 mb-8 text-center">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Livros -->
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-indigo-700 mb-4">📚 Livros</h2>
            <p class="text-gray-700">Total: <span class="font-bold">{{ $totalBooks }}</span></p>
            <p class="text-gray-700">Disponíveis: <span class="font-bold">{{ $availableBooks }}</span></p>
            <p class="text-gray-700">Emprestados: <span class="font-bold">{{ $loanedBooks }}</span></p>
        </div>

        <!-- Usuários -->
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-indigo-700 mb-4">👥 Usuários</h2>
            <p class="text-gray-700">Total de Usuários: <span class="font-bold">{{ $totalUsers }}</span></p>
        </div>

        <!-- Empréstimos -->
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-indigo-700 mb-4">📄 Empréstimos</h2>
            <p class="text-gray-700">Ativos: <span class="font-bold">{{ $activeLoans }}</span></p>
            <p class="text-gray-700">Devolvidos: <span class="font-bold">{{ $returnedLoans }}</span></p>
            <p class="text-gray-700">Atrasados: <span class="font-bold">{{ $lateLoans }}</span></p>
        </div>

    </div>
</div>
@endsection
