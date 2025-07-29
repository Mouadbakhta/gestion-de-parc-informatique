<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">{{ __('Tableau de bord Employé') }}</h2>
    </x-slot>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bienvenue, {{ auth()->user()->name }}</h5>
                        <p class="card-text">Consultez vos demandes ou le stock disponible.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('employe.demandes.index') }}" class="btn btn-primary">Mes demandes</a>
                            <a href="{{ route('employe.stock.index') }}" class="btn btn-primary">Stock</a>
                            @if (Route::has('employe.historique.index'))
                                <a href="{{ route('employe.historique.index') }}" class="btn btn-primary">Historique</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>