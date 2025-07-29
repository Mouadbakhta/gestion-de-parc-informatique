<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriqueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'utilisateur_id' => User::factory(),
            'equipement_id' => Equipement::factory(),
            'date_debut' => $this->faker->dateTimeThisYear(),
            'date_fin' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
}
?>
