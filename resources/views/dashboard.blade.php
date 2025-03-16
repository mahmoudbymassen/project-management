<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de Bord
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistiques en haut -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Carte : Projets en cours -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Projets en cours</h3>
                    <p class="text-3xl font-bold text-blue-500">12</p>
                    <p class="text-sm text-gray-500">+2 depuis la semaine dernière</p>
                </div>

                <!-- Carte : Tâches complétées -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Tâches complétées</h3>
                    <p class="text-3xl font-bold text-green-500">45</p>
                    <p class="text-sm text-gray-500">+10 depuis hier</p>
                </div>

                <!-- Carte : Échéances à venir -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Échéances à venir</h3>
                    <p class="text-3xl font-bold text-red-500">3</p>
                    <p class="text-sm text-gray-500">Dernière échéance : Demain</p>
                </div>
            </div>

            <!-- Graphique et Liste des Projets -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Graphique -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Progression des Projets</h3>
                    <canvas id="projectProgressChart" class="w-full h-64"></canvas>
                </div>

                <!-- Liste des Projets Récents -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Projets Récents</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Projet A</span>
                            <span class="text-sm text-gray-500">75% complété</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Projet B</span>
                            <span class="text-sm text-gray-500">50% complété</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Projet C</span>
                            <span class="text-sm text-gray-500">25% complété</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tableau des Tâches -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Tâches Récentes</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tâche</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projet</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Échéance</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Design de l'interface</td>
                            <td class="px-6 py-4 whitespace-nowrap">Projet A</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm text-green-800 bg-green-100 rounded-full">Complété</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">15/10/2023</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Développement backend</td>
                            <td class="px-6 py-4 whitespace-nowrap">Projet B</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm text-yellow-800 bg-yellow-100 rounded-full">En cours</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">20/10/2023</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Tests unitaires</td>
                            <td class="px-6 py-4 whitespace-nowrap">Projet C</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm text-red-800 bg-red-100 rounded-full">En retard</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">10/10/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Intégration de Chart.js pour les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Graphique de progression des projets
        const ctx = document.getElementById('projectProgressChart').getContext('2d');
        const projectProgressChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Projet A', 'Projet B', 'Projet C'],
                datasets: [{
                    label: 'Progression (%)',
                    data: [75, 50, 25],
                    backgroundColor: ['#3b82f6', '#10b981', '#ef4444'],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</x-app-layout>