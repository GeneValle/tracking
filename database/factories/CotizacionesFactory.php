<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Cotizaciones;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CotizacionesFactory extends Factory
{
    protected $model = Cotizaciones::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productos_id' =>rand(Productos::min('id'), Productos::max('id')),
            'precio' =>$this->faker->randomNumber(5, false),
            'cantidad' =>$this->faker->randomDigit(),
            'descuento' =>$this->faker->numberBetween(0,100),
            'observaciones' =>$this->faker->paragraph(),
            'fecha' =>$this->faker->date(),
            'total' =>$this->faker->randomNumber(5, false),
            'estado' =>$this->faker->word(),
            'envios' =>$this->faker->word(),
            'visitas' =>$this->faker->word(),
            'contactos_id' =>rand(Contactos::min('id'), Contactos::max('id')),
            'users_id' =>rand(User::min('id'), User::max('id'))
        ];
    }
}
