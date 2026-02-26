<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:20px;font-weight:800;color:#111827;">Listar Projetos</h2>
    </x-slot>

    <div style="max-width:1100px;">

        @if(session('success'))
            <div style="margin-bottom:14px;background:#dcfce7;border:1px solid #86efac;color:#166534;padding:12px;border-radius:14px;font-weight:700;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08);overflow:hidden;">
            <table style="width:100%;border-collapse:collapse;">
                <thead style="background:#f8fafc;">
                    <tr>
                        <th style="text-align:left;padding:14px;border-bottom:1px solid #e2e8f0;">Nome</th>
                        <th style="text-align:left;padding:14px;border-bottom:1px solid #e2e8f0;">Início</th>
                        <th style="text-align:left;padding:14px;border-bottom:1px solid #e2e8f0;">Fim</th>
                        <th style="text-align:left;padding:14px;border-bottom:1px solid #e2e8f0;">Tecnologias</th>
                        <th style="text-align:left;padding:14px;border-bottom:1px solid #e2e8f0;">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td style="padding:14px;border-bottom:1px solid #e2e8f0;font-weight:700;color:#0f172a;">
                                {{ $project->name }}
                            </td>
                            <td style="padding:14px;border-bottom:1px solid #e2e8f0;color:#334155;">
                                {{ $project->start_date }}
                            </td>
                            <td style="padding:14px;border-bottom:1px solid #e2e8f0;color:#334155;">
                                {{ $project->end_date ?? '-' }}
                            </td>
                            <td style="padding:14px;border-bottom:1px solid #e2e8f0;color:#334155;">
                                {{ $project->technologies ?? '-' }}
                            </td>

                            <td style="padding:14px;border-bottom:1px solid #e2e8f0;">
                                <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
                                    <!-- ✅ ATUALIZAR -->
                                    <a href="{{ route('projects.edit', $project) }}"
                                       style="display:inline-block;background:#2563eb;color:#fff;padding:10px 14px;border-radius:12px;font-weight:800;text-decoration:none;">
                                        ATUALIZAR
                                    </a>

                                    <!-- ✅ EXCLUIR -->
                                    <form method="POST" action="{{ route('projects.destroy', $project) }}"
                                          onsubmit="return confirm('Tem certeza que deseja excluir?')"
                                          style="margin:0;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                style="background:#dc2626;color:#fff;border:none;padding:10px 14px;border-radius:12px;font-weight:800;cursor:pointer;">
                                            EXCLUIR
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding:18px;color:#64748b;">
                                Nenhum projeto cadastrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:14px;">
            {{ $projects->links() }}
        </div>
    </div>
</x-app-layout>