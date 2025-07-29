<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Emplacements
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('admin.emplacements.create') }}" class="btn btn-primary mb-4">Ajouter Emplacement</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom du lieu</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emplacements as $emplacement)
                                <tr>
                                    <td>{{ $emplacement->nom_lieu }}</td>
                                    <td>{{ $emplacement->description ?? 'Aucune' }}</td>
                                    <td>
                                        <a href="{{ route('admin.emplacements.edit', $emplacement) }}" class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('admin.emplacements.destroy', $emplacement) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
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
