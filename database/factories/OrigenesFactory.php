<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Origenes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrigenesFactory extends Factory
{
    protected $model = Origenes::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'origen' =>$this->faker->word(),
            'contactos_id'=> rand(Contactos::min('id'), Contactos::max('id'))
        ];
    }
}
