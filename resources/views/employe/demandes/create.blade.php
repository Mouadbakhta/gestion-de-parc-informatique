<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvelle Demande
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('employe.demandes.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="equipement_id" class="form-label">Équipement</label>
                            <select name="equipement_id" id="equipement_id" class="form-control" required>
                                @foreach ($equipements as $equipement)
                                    <option value="{{ $equipement->id }}">{{ $equipement->nom }} (Stock: {{ $equipement->stock }})</option>
                                @endforeach
                            </select>
                            @error('equipement_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
