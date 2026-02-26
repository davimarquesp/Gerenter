<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Meu Perfil</h2>
    </x-slot>

    <div class="max-w-3xl bg-white rounded-2xl shadow p-6">
        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-800 p-4 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 p-4 rounded-xl">
                <p class="font-semibold">Corrija os erros abaixo:</p>
                <ul class="list-disc ml-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Nome</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="w-full border rounded-xl p-3"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full border rounded-xl p-3"
                    required
                >
            </div>

            <div>
                <label class="block text-sm font-medium">CPF</label>
                <input
                    type="text"
                    name="cpf"
                    value="{{ old('cpf', $user->cpf) }}"
                    class="w-full border rounded-xl p-3"
                    required
                >
            </div>

            <!-- ✅ BOTÃO SALVAR (SUBMIT) -->
            <button
                type="submit"
                class="bg-black text-white px-6 py-3 rounded-xl font-semibold"
            >
                Atualizar Perfil
            </button>

            <button type="submit"
  style="background:#111827;color:#fff;border:none;padding:12px 18px;border-radius:14px;font-weight:800;cursor:pointer;margin-top:16px;">
  SALVAR ALTERAÇÕES
</button>
        </form>
    </div>
</x-app-layout>