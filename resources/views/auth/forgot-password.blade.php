<x-guest-layout>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg p-4 border-0 rounded-4" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary fw-bold">Réinitialisation du mot de passe</h2>

                <p class="text-muted text-center mb-4">
                    Vous avez oublié votre mot de passe ? Aucun souci. Entrez votre adresse e-mail et nous vous enverrons un lien pour le réinitialiser.
                </p>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                        <input id="email" type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autofocus placeholder="exemple@domaine.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            {{ __('Envoyer le lien de réinitialisation') }}
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                        &larr; Retour à la connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

