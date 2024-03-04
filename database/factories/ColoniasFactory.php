<?php

namespace Database\Factories;

use App\Models\Colonias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ColoniasFactory extends Factory
{
    protected $model = Colonias::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colonia'  =>$this->faker->word(),
            'codPostal' =>$this->faker->numberBetween(10000,100000)
        ];
    }
}
