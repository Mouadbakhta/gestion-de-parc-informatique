<?php
  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Models\Demande;
  use App\Models\Equipement;
  use App\Models\User;
  use Illuminate\Http\Request;

  class DemandeController extends Controller
  {
      public function index()
      {
          $demandes = Demande::with(['utilisateur', 'equipement'])->get();
          return view('admin.demandes.index', compact('demandes'));
      }

      public function create()
      {
          $users = User::all();
          $equipements = Equipement::all();
          return view('admin.demandes.create', compact('users', 'equipements'));
      }

      public function store(Request $request)
      {
          $request->validate([
              'utilisateur_id' => ['required', 'exists:users,id'],
              'equipement_id' => ['required', 'exists:equipements,id'],
              'etat' => ['required', 'in:en_attente,approuvée,rejetée'],
          ]);

          Demande::create($request->all());
          return redirect()->route('admin.demandes.index')->with('success', 'Demande créée.');
      }

      public function edit(Demande $demande)
      {
          $users = User::all();
          $equipements = Equipement::all();
          return view('admin.demandes.edit', compact('demande', 'users', 'equipements'));
      }

      public function update(Request $request, Demande $demande)
      {
          $request->validate([
              'utilisateur_id' => ['required', 'exists:users,id'],
              'equipement_id' => ['required', 'exists:equipements,id'],
              'etat' => ['required', 'in:en_attente,approuvée,rejetée'],
          ]);

          $demande->update($request->all());
          return redirect()->route('admin.demandes.index')->with('success', 'Demande mise à jour.');
      }

      public function destroy(Demande $demande)
      {
          $demande->delete();
          return redirect()->route('admin.demandes.index')->with('success', 'Demande supprimée.');
      }
  }
  ?>
