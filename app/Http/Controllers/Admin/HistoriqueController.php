<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Historique;

class HistoriqueController extends Controller
    {
        public function index()
        {
        $historiques = Historique::with(['utilisateur', 'equipement'])->get();
        return view('admin.historique.index', compact('historiques'));
        }
    }
?>
