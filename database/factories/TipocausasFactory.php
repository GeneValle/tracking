<?php

namespace Database\Factories;

use App\Models\Tipocausas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TipocausasFactory extends Factory
{
    protected $model = Tipocausas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipoCausa'=>$this->faker->randomElement(['precio', 'no le interesa', 'otro'])
        ];
    }
}
