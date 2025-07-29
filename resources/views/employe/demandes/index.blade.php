<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes Demandes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('employe.demandes.create') }}" class="btn btn-primary mb-4">Nouvelle Demande</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Équipement</th>
                                <th>Date de demande</th>
                                <th>État</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->equipement->nom }}</td>
                                    <td>{{ $demande->date_demande->format('d/m/Y') }}</td>
                                    <td>{{ $demande->etat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
