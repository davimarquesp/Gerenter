<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:20px;font-weight:800;color:#111827;">Atualizar Projeto</h2>
    </x-slot>

    <div style="max-width:900px;background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08);padding:22px;">

        @if ($errors->any())
            <div style="margin-bottom:14px;background:#fef2f2;border:1px solid #fecaca;color:#991b1b;padding:12px;border-radius:14px;font-weight:700;">
                Corrija os erros e tente novamente.
            </div>
        @endif

        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom:14px;">
                <label style="display:block;font-weight:800;color:#334155;margin-bottom:6px;">Nome</label>
                <input name="name" value="{{ old('name', $project->name) }}" required
                       style="width:100%;max-width:520px;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;">
                @error('name') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
            </div>

            <div style="display:flex;gap:14px;flex-wrap:wrap;margin-bottom:14px;">
                <div>
                    <label style="display:block;font-weight:800;color:#334155;margin-bottom:6px;">Data de início</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $project->start_date) }}" required
                           style="width:260px;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;">
                    @error('start_date') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label style="display:block;font-weight:800;color:#334155;margin-bottom:6px;">Data de fim</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $project->end_date) }}"
                           style="width:260px;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;">
                    @error('end_date') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
                </div>
            </div>

            <div style="margin-bottom:14px;">
                <label style="display:block;font-weight:800;color:#334155;margin-bottom:6px;">Descrição</label>
                <textarea name="description" rows="4"
                          style="width:100%;max-width:720px;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;">{{ old('description', $project->description) }}</textarea>
                @error('description') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
            </div>

            <div style="margin-bottom:14px;">
                <label style="display:block;font-weight:800;color:#334155;margin-bottom:6px;">Tecnologias usadas</label>
                <input name="technologies" value="{{ old('technologies', $project->technologies) }}"
                       style="width:100%;max-width:720px;padding:12px 14px;border:1px solid #e2e8f0;border-radius:14px;">
                @error('technologies') <div style="color:#dc2626;font-size:13px;margin-top:6px;">{{ $message }}</div> @enderror
            </div>

            <!-- ✅ BOTÕES GARANTIDOS -->
            <div style="display:flex;gap:12px;align-items:center;margin-top:16px;">
                <button type="submit"
                        style="background:#111827;color:#fff;border:none;padding:12px 18px;border-radius:14px;font-weight:900;cursor:pointer;">
                    SALVAR
                </button>

                <a href="{{ route('projects.index') }}"
                   style="display:inline-block;border:1px solid #cbd5e1;padding:12px 18px;border-radius:14px;font-weight:900;color:#0f172a;text-decoration:none;">
                    CANCELAR
                </a>
            </div>
        </form>
    </div>
</x-app-layout>