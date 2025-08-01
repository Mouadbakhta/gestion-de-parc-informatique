<?php
namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\DemandeCree;

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

    // Créer la demande
    $demande = Demande::create([
        'utilisateur_id' => Auth::id(),
        'equipement_id' => $request->equipement_id,
        'etat' => 'en_attente',
    ]);
    $demande->load('user', 'equipement');

    // Récupérer tous les admins
    $admins = User::where('role', 'admin')->get(); // Remplace 'role' selon ton système d'utilisateur

    // Envoyer une notification par email à chaque admin
    foreach ($admins as $admin) {
        $admin->notify(new DemandeCree($demande));
    }

    return redirect()->route('employe.demandes.index')->with('success', 'Demande créée et notifiée aux administrateurs.');
}

}
?>
