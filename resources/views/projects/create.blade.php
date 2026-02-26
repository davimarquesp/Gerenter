<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Cadastrar Projeto</h2>
    </x-slot>

    <div class="max-w-3xl bg-white rounded-2xl shadow p-6">
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

        <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Nome</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border rounded-xl p-3"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Data de início</label>
                    <input
                        type="date"
                        name="start_date"
                        value="{{ old('start_date') }}"
                        class="w-full border rounded-xl p-3"
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium">Data de fim</label>
                    <input
                        type="date"
                        name="end_date"
                        value="{{ old('end_date') }}"
                        class="w-full border rounded-xl p-3"
                    >
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Descrição</label>
                <textarea
                    name="description"
                    class="w-full border rounded-xl p-3"
                    rows="4"
                >{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Tecnologias usadas</label>
                <input
                    type="text"
                    name="technologies"
                    value="{{ old('technologies') }}"
                    class="w-full border rounded-xl p-3"
                    placeholder="Ex: Laravel, MySQL, Tailwind"
                >
            </div>

            <!-- ✅ BOTÕES (IMPORTANTE: DENTRO DO FORM) -->
            <div class="flex gap-3 pt-2">
                <button
                    type="submit"
                    class="bg-black text-white px-6 py-3 rounded-xl font-semibold"
                >
                    Salvar
                </button>

             
            </div>
            <div style="display:flex;gap:12px;align-items:center;margin-top:16px;">
  <button type="submit"
    style="background:#111827;color:#fff;border:none;padding:12px 18px;border-radius:14px;font-weight:800;cursor:pointer;">
    SALVAR
  </button>

  <a href="{{ route('projects.index') }}"
     style="display:inline-block;border:1px solid #cbd5e1;padding:12px 18px;border-radius:14px;font-weight:800;color:#0f172a;text-decoration:none;">
    CANCELAR
  </a>
</div>
        </form>
    </div>
</x-app-layout>