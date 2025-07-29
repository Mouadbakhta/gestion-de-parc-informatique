<?php
  namespace App\Http\Controllers\Employe;

  use App\Http\Controllers\Controller;
  use App\Models\Equipement;

  class StockController extends Controller
  {
      public function index()
      {
          $equipements = Equipement::where('stock', '>', 0)->with('emplacement')->get();
          return view('employe.stock.index', compact('equipements'));
      }
  }
?>
