<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto space-y-6">
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Projetos cadastrados por mês</h3>
            <canvas id="projectsChart" height="90"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const data = @json($data);

        new Chart(document.getElementById('projectsChart'), {
            type: 'bar',
            data: {
                labels,
                datasets: [{ label: 'Projetos', data }]
            }
        });
    </script>
</x-app-layout>