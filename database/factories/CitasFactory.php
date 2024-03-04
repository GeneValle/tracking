<?php

namespace Database\Factories;

use App\Models\Citas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CitasFactory extends Factory
{
    protected $model = Citas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['Indefinida', 'Personal', 'Teléfonica', 'Confirmación Stand', 'Confirmación pase o paquete']),
            'lugar' => $this->faker->word(),
            'comentarios' => $this->faker->paragraph()
        ];
    }
}
