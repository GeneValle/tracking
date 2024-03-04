<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Detallepreferencias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetallepreferenciasFactory extends Factory
{
    protected $model = Detallepreferencias::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pase' => $this->faker->randomElement(['tipo infantil', 'tipo b', 'tipo a']),
            'stand' => $this->faker->randomElement(['6 X 15', '6 X 6', '3 X 9', '3 X 6', '3 X 3']),
            'paquete' => $this->faker->randomElement(['doble tipo a', 'doble tipo b', 'sencillo tipo a', 'sencillo tipo b']),
            'contactos_id' => rand(Contactos::min('id'),Contactos::max('id'))
        ];
    }
}
