<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema de Biblioteca</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

  <!-- Header / Navbar -->
  <nav class="bg-primary-600 text-white p-4">
    <div class="container mx-auto flex justify-between">
      <div>
        <a href="{{ route('dashboard') }}" class="font-bold text-lg">Biblioteca - Dashboard</a>
      </div>
      <div>
        <a href="{{ route('users.index') }}" class="mx-2 hover:underline">Usuários</a>
        <a href="{{ route('books.index') }}" class="mx-2 hover:underline">Livros</a>
        <a href="{{ route('loans.index') }}" class="mx-2 hover:underline">Empréstimos</a>
        <a href="{{ route('genres.index') }}" class="text-sm text-gray-800 hover:text-indigo-600">Gêneros</a>

      </div>
    </div>
  </nav>

  <!-- Flash Messages (sucesso/erro) -->
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-4 rounded">
      {{ session('success') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-4 rounded">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Main Content -->
  <div class="container mx-auto mt-4">
    @yield('content')
  </div>

</body>
</html>
