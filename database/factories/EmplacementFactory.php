<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmplacementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom_lieu' => $this->faker->randomElement([
                'Salle A1',
                'Bureau B2',
                'Entrepôt C',
                'Labo D3',
                'Salle de réunion E',
            ]),
            'description' => $this->faker->sentence(),
        ];
    }
}
?>