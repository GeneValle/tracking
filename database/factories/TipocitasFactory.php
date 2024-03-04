<?php

namespace Database\Factories;

use App\Models\Citas;
use App\Models\Tipocitas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TipocitasFactory extends Factory
{
    protected $model = Tipocitas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipoCita'=>$this->faker->randomElement(['Indefinida', 'Personal', 'Teléfonica', 'Confirmación stand', 'Confirmación pase o paquete']),
            'duracion'=>$this->faker->randomElement(['5', '10', '15', '60']),
            'citas_id'=>rand(Citas::min('id'), Citas::max('id'))
        ];
    }
}
