<?php
  namespace App\Http\Controllers\Employe;

  use App\Http\Controllers\Controller;
  use App\Models\Demande;
  use App\Models\Equipement;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;

  class DemandeController extends Controller
  {
      public function index()
      {
          $demandes = Demande::where('utilisateur_id', Auth::id())->with('equipement')->get();
          return view('employe.demandes.index', compact('demandes'));
      }

      public function create()
      {
          $equipements = Equipement::where('stock', '>', 0)->get();
          return view('employe.demandes.create', compact('equipements'));
      }

      public function store(Request $request)
      {
          $request->validate([
              'equipement_id' => ['required', 'exists:equipements,id'],
          ]);

          Demande::create([
              'utilisateur_id' => Auth::id(),
              'equipement_id' => $request->equipement_id,
              'etat' => 'en_attente',
          ]);

          return redirect()->route('employe.demandes.index')->with('success', 'Demande créée.');
      }
  }
?>
