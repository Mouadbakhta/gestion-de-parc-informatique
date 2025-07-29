<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'Équipement
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.equipements.update', $equipement) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $equipement->nom) }}" required>
                            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $equipement->type) }}" required>
                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="etat" class="form-label">État</label>
                            <select name="etat" id="etat" class="form-control" required>
                                <option value="Neuf" {{ $equipement->etat === 'Neuf' ? 'selected' : '' }}>Neuf</option>
                                <option value="Utilisé" {{ $equipement->etat === 'Utilisé' ? 'selected' : '' }}>Utilisé</option>
                                <option value="En panne" {{ $equipement->etat === 'En panne' ? 'selected' : '' }}>En panne</option>
                            </select>
                            @error('etat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $equipement->stock) }}" required>
                            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="emplacement_id" class="form-label">Emplacement</label>
                            <select name="emplacement_id" id="emplacement_id" class="form-control" required>
                                @foreach ($emplacements as $emplacement)
                                    <option value="{{ $emplacement->id }}" {{ $equipement->emplacement_id === $emplacement->id ? 'selected' : '' }}>{{ $emplacement->nom_lieu }}</option>
                                @endforeach
                            </select>
                            @error('emplacement_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
