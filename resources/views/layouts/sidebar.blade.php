<div class="min-h-screen flex bg-gray-100">
    <aside class="w-64 bg-white shadow-md p-4">
        <div class="font-bold text-xl mb-6">Sistema</div>

        <nav class="space-y-2">
            <a class="block p-2 rounded hover:bg-gray-100" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="block p-2 rounded hover:bg-gray-100" href="{{ route('projects.create') }}">Cadastrar Projetos</a>
            <a class="block p-2 rounded hover:bg-gray-100" href="{{ route('projects.index') }}">Listar Projetos</a>
            <a class="block p-2 rounded hover:bg-gray-100" href="{{ route('profile.edit') }}">Perfil</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left p-2 rounded hover:bg-gray-100">Sair</button>
            </form>
        </nav>
    </aside>

    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</div>