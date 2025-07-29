<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nom') }}</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label for="role" class="form-label">{{ __('Rôle') }}</label>
            <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                <option value="" disabled {{ old('role') ? '' : 'selected' }}>{{ __('Sélectionner un rôle') }}</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>{{ __('Administrateur') }}</option>
                <option value="employe" {{ old('role') == 'employe' ? 'selected' : '' }}>{{ __('Employé') }}</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Département -->
        <div class="mb-3">
            <label for="departement_id" class="form-label">{{ __('Département') }}</label>
            <select id="departement_id" class="form-select @error('departement_id') is-invalid @enderror" name="departement_id" required>
                <option value="" disabled {{ old('departement_id') ? '' : 'selected' }}>{{ __('Sélectionner un département') }}</option>
                @foreach(\App\Models\Departement::all() as $departement)
                    <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>{{ $departement->nom }}</option>
                @endforeach
            </select>
            @error('departement_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <!-- Submit Button -->
        <div class="d-flex align-items-center justify-content-between">
            <a class="text-primary" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>
            <button type="submit" class="btn btn-primary">
                {{ __('Inscription') }}
            </button>
        </div>
    </form>
</x-guest-layout>
