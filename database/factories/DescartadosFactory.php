<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Descartados;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DescartadosFactory extends Factory
{
    protected $model = Descartados::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha'=>$this->faker->date(),
            'contactos_id'=>rand(Contactos::min('id'), Contactos::max('id')),
            'causa'=>$this->faker->randomElement(['precio', 'no le interesa', 'otro']),
            'users_id'=>rand(User::min('id'),User::max('id'))
        ];
    }
}
