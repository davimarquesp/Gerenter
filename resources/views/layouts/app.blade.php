<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
<div class="min-h-screen flex">
    <aside class="w-72 bg-white shadow-md">
        <div class="p-6 border-b">
            <div class="text-xl font-bold">Gerenciador</div>
            <div class="text-sm text-gray-500 mt-1">{{ auth()->user()->name }}</div>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('projects.create') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('projects.create') ? 'bg-gray-100 font-semibold' : '' }}">
                Cadastrar Projetos
            </a>

            <a href="{{ route('projects.index') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('projects.index') ? 'bg-gray-100 font-semibold' : '' }}">
                Listar Projetos
            </a>

            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('profile.edit') ? 'bg-gray-100 font-semibold' : '' }}">
                Perfil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-gray-100">
                    Sair
                </button>
            </form>
        </nav>
    </aside>

    <main class="flex-1">
        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-6">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <div class="py-8 px-6">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>