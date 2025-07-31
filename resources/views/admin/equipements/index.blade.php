<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">{{ __('Gestion des équipements') }}</h2>
    </x-slot>

    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Bouton pour ajouter un équipement -->
                        <a href="{{ route('admin.equipements.create') }}" class="btn btn-success mb-3">
                            Ajouter un équipement
                        </a>

                        <!-- Message de succès (si équipement ajouté/modifié/supprimé) -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Tableau des équipements -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        <th>État</th>
                                        <th>Emplacement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($equipements as $equipement)
                                        <tr>
                                            <td>{{ $equipement->nom }}</td>
                                            <td>{{ $equipement->type }}</td>
                                            <td>
                                                <span class="badge {{ $equipement->etat === 'disponible' ? 'bg-success' : ($equipement->etat === 'en_panne' ? 'bg-danger' : 'bg-warning') }}">
                                                    {{ $equipement->etat }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $equipement->emplacement ? $equipement->emplacement->nom_lieu : 'Non assigné' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.equipements.edit', $equipement) }}" class="btn btn-primary btn-sm">
                                                        Modifier
                                                    </a>
                                                    <form action="{{ route('admin.equipements.destroy', $equipement) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                Aucun équipement disponible.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>