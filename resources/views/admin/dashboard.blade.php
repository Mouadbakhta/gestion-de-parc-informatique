<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">{{ __('Tableau de bord Admin') }}</h2>
    </x-slot>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenue, {{ auth()->user()->name }}</h5>
                        <p class="card-text">Gérez les utilisateurs, équipements, emplacements, demandes et historiques.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Utilisateurs</a>
                            <a href="{{ route('admin.equipements.index') }}" class="btn btn-primary">Équipements</a>
                            <a href="{{ route('admin.emplacements.index') }}" class="btn btn-primary">Emplacements</a>
                            <a href="{{ route('admin.demandes.index') }}" class="btn btn-primary">Demandes</a>
                            <a href="{{ route('admin.historique.index') }}" class="btn btn-primary">Historique</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>