<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Demandes
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
                                <th>Date de demande</th>
                                <th>État</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->utilisateur->name }}</td>
                                    <td>{{ $demande->equipement->nom }}</td>
                                    <td>{{ $demande->date_demande->format('d/m/Y') }}</td>
                                    <td>{{ $demande->etat }}</td>
                                    <td>
                                        <form action="{{ route('admin.demandes.update', $demande) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <select name="etat" onchange="this.form.submit()">
                                                <option value="en_attente" {{ $demande->etat === 'en_attente' ? 'selected' : '' }}>En attente</option>
                                                <option value="validee" {{ $demande->etat === 'validee' ? 'selected' : '' }}>Validée</option>
                                                <option value="refusee" {{ $demande->etat === 'refusee' ? 'selected' : '' }}>Refusée</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
