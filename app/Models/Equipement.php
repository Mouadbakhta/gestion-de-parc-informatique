<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'etat', 'stock', 'emplacement_id'];

    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function historiques()
    {
        return $this->hasMany(Historique::class);
    }
}
?>