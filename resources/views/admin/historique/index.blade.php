<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historique des Attributions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Équipement</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historiques as $historique)
                                <tr>
                                    <td>{{ $historique->utilisateur->name }}</td>
                                    <td>{{ $historique->equipement->nom }}</td>
                                    <td>{{ $historique->date_debut->format('d/m/Y') }}</td>
                                    <td>{{ $historique->date_fin ? $historique->date_fin->format('d/m/Y') : 'En cours' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
