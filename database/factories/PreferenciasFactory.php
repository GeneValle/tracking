<?php

namespace Database\Factories;

use App\Models\Preferencias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PreferenciasFactory extends Factory
{
    protected $model = Preferencias::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['pase', 'stand', 'paquete']),
            'valores' => $this->faker->randomElement(['Tipo infantil', 'Tipo A', 'Tipo B']),
        ];
    }
}
