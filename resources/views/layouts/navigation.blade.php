<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">{{ config('app.name', 'Gestion Parc') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    @if (auth()->user()->isAdmin())
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.equipements.index') }}">Équipements</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.emplacements.index') }}">Emplacements</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.demandes.index') }}">Demandes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.historique.index') }}">Historique</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('employe.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('employe.demandes.index') }}">Demandes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('employe.stock.index') }}">Stock</a></li>
                        @if (Route::has('employe.historique.index'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('employe.historique.index') }}">Historique</a></li>
                        @endif
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a></li>
                            <li><form method="POST" action="{{ route('logout') }}">@csrf <button type="submit" class="dropdown-item">Déconnexion</button></form></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>