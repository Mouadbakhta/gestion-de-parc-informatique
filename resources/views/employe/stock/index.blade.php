<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock des Équipements
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>État</th>
                                <th>Stock</th>
                                <th>Emplacement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipements as $equipement)
                                <tr>
                                    <td>{{ $equipement->nom }}</td>
                                    <td>{{ $equipement->type }}</td>
                                    <td>{{ $equipement->etat }}</td>
                                    <td>{{ $equipement->stock }}</td>
                                    <td>{{ $equipement->emplacement->nom_lieu ?? 'Aucun' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
