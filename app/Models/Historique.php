<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id', 'equipement_id', 'date_debut', 'date_fin'];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function equipement()
    {
        return $this->belongsTo(Equipement::class);
    }
}
?>