<?php
  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Models\Emplacement;
  use Illuminate\Http\Request;

  class EmplacementController extends Controller
  {
      public function index()
      {
          $emplacements = Emplacement::all();
          return view('admin.emplacements.index', compact('emplacements'));
      }

      public function create()
      {
          return view('admin.emplacements.create');
      }

      public function store(Request $request)
      {
          $request->validate([
              'nom_lieu' => ['required', 'string', 'max:255'],
              'description' => ['nullable', 'string'],
          ]);

          Emplacement::create($request->all());
          return redirect()->route('admin.emplacements.index')->with('success', 'Emplacement créé.');
      }

      public function edit(Emplacement $emplacement)
      {
          return view('admin.emplacements.edit', compact('emplacement'));
      }

      public function update(Request $request, Emplacement $emplacement)
      {
          $request->validate([
              'nom_lieu' => ['required', 'string', 'max:255'],
              'description' => ['nullable', 'string'],
          ]);

          $emplacement->update($request->all());
          return redirect()->route('admin.emplacements.index')->with('success', 'Emplacement mis à jour.');
      }

      public function destroy(Emplacement $emplacement)
      {
          $emplacement->delete();
          return redirect()->route('admin.emplacements.index')->with('success', 'Emplacement supprimé.');
      }
  }
  ?>
