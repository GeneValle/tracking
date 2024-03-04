<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VentasFactory extends Factory
{
    protected $model = Ventas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha'=>$this->faker->date(),
            'monto'=>$this->faker->randomFloat(2, 100, 1000000),
            'observaciones'=>$this->faker->paragraph(),
            
            'users_id'=>rand(User::min('id'),User::max('id')),
            'contactos_id'=>rand(Contactos::min('id'),Contactos::max('id'))
        ];
    }
}
