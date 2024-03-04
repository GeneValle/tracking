<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductosFactory extends Factory
{
    protected $model = Productos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto' => $this->faker->randomElement(['pase A', 'pase B']),
            'precio' => $this->faker->numberBetween(2500, 10000),
            'descripcion' => $this->faker->sentence()
        ];
    }
}
