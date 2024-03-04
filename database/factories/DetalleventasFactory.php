<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Detallecontactos;
use App\Models\Detalleventas;
use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetalleventasFactory extends Factory
{
    protected $model = Detalleventas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $currentId = 1;

        if ($currentId > 15) {
            $currentId = 1;
        }

        $ventasId = $currentId;
        $currentId++;

        return [
            'referencia' => $this->faker->sentence(),
            'fecha' => $this->faker->date(),
            'productos_id' => rand(Productos::min('id'), Productos::max('id')),
            'total' => $this->faker->randomFloat(2, 100, 1000000),
            'observaciones' => $this->faker->paragraph(),
            'ventas_id' => $ventasId,
            'contactos_id' => rand(Contactos::min('id'), Contactos::max('id')),
            'detallecontactos_id' => rand(Detallecontactos::min('id'), Detallecontactos::max('id'))
        ];
    }
}
