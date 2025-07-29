<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    use HasFactory;

    protected $fillable = ['nom_lieu', 'description'];

    public function equipements()
    {
        return $this->hasMany(Equipement::class);
    }
}
?>
