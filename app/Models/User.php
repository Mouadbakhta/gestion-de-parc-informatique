<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'password', 'role', 'departement_id'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];
    public function isAdmin() { return $this->role === 'admin'; }
    public function departement() { return $this->belongsTo(Departement::class); }
    public function demandes() { return $this->hasMany(Demande::class); }
    public function historiques() { return $this->hasMany(Historique::class); }
}
?>