<?php
namespace Database\Factories;

use App\Models\Emplacement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->randomElement([
                'Ordinateur portable',
                'Imprimante',
                'Serveur',
                'Routeur',
                'Écran',
            ]),
            'type' => $this->faker->randomElement(['PC', 'Périphérique', 'Réseau']),
            'etat' => $this->faker->randomElement(['Neuf', 'Usagé', 'En panne']),
            'stock' => $this->faker->numberBetween(1, 50),
            'emplacement_id' => Emplacement::factory(),
        ];
    }
}
?>
