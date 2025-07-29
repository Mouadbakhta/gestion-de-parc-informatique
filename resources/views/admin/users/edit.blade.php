<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'Utilisateur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Nouveau mot de passe (facultatif)</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="employe" {{ $user->role === 'employe' ? 'selected' : '' }}>Employé</option>
                            </select>
                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="departement_id" class="form-label">Département</label>
                            <select name="departement_id" id="departement_id" class="form-control" required>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}" {{ $user->departement_id === $departement->id ? 'selected' : '' }}>{{ $departement->nom }}</option>
                                @endforeach
                            </select>
                            @error('departement_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
