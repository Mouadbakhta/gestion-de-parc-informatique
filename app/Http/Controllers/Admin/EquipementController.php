<?php
  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Models\Emplacement;
  use App\Models\Equipement;
  use Illuminate\Http\Request;

  class EquipementController extends Controller
  {
      public function index()
      {
          $equipements = Equipement::with('emplacement')->get();
          return view('admin.equipements.index', compact('equipements'));
      }

      public function create()
      {
          $emplacements = Emplacement::all();
          return view('admin.equipements.create', compact('emplacements'));
      }

      public function store(Request $request)
      {
          $request->validate([
              'nom' => ['required', 'string', 'max:255'],
              'type' => ['required', 'in:PC,Périphérique,Réseau'],
              'etat' => ['required', 'in:Neuf,Usagé,En panne'],
              'stock' => ['required', 'integer', 'min:0'],
              'emplacement_id' => ['required', 'exists:emplacements,id'],
          ]);

          Equipement::create($request->all());
          return redirect()->route('admin.equipements.index')->with('success', 'Équipement créé.');
      }

      public function edit(Equipement $equipement)
      {
          $emplacements = Emplacement::all();
          return view('admin.equipements.edit', compact('equipement', 'emplacements'));
      }

      public function update(Request $request, Equipement $equipement)
      {
          $request->validate([
              'nom' => ['required', 'string', 'max:255'],
              'type' => ['required', 'in:PC,Périphérique,Réseau'],
              'etat' => ['required', 'in:Neuf,Usagé,En panne'],
              'stock' => ['required', 'integer', 'min:0'],
              'emplacement_id' => ['required', 'exists:emplacements,id'],
          ]);

          $equipement->update($request->all());
          return redirect()->route('admin.equipements.index')->with('success', 'Équipement mis à jour.');
      }

      public function destroy(Equipement $equipement)
      {
          $equipement->delete();
          return redirect()->route('admin.equipements.index')->with('success', 'Équipement supprimé.');
      }
  }
?>
