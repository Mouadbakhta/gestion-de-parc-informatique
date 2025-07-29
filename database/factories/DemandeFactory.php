<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'utilisateur_id' => User::factory(),
            'equipement_id' => Equipement::factory(),
            'etat' => $this->faker->randomElement(['en_attente', 'approuvée', 'rejetée']),
            'date_demande' => $this->faker->dateTimeThisYear(),
        ];
    }
}
?>
