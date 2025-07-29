<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'Emplacement
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.emplacements.update', $emplacement) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="nom_lieu" class="form-label">Nom du lieu</label>
                            <input type="text" name="nom_lieu" id="nom_lieu" class="form-control" value="{{ old('nom_lieu', $emplacement->nom_lieu) }}" required>
                            @error('nom_lieu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $emplacement->description) }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
