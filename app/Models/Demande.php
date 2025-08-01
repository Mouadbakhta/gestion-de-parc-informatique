<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id', 'equipement_id', 'etat', 'date_demande'];

    protected $casts = [
        'date_demande' => 'datetime',
    ];
    public function user()
        {
    return $this->belongsTo(User::class, 'utilisateur_id');
        }
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