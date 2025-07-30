<x-guest-layout>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg p-4 border-0 rounded-4" style="max-width: 500px; width: 100%;">
            <div class="card-body">
                <h2 class="text-center mb-4 text-primary fw-bold">Connexion à votre compte</h2>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                        <input id="email" type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required autofocus autocomplete="username"
                               placeholder="exemple@domaine.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required autocomplete="current-password" placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Se souvenir de moi') }}
                        </label>
                    </div>

                    <!-- Submit + Forgot -->
                    <div class="d-flex align-items-center justify-content-between">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary px-4">
                            {{ __('Se connecter') }}
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">Pas encore de compte ?
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">
                            S'inscrire
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
