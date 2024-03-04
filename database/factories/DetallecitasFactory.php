<?php

namespace Database\Factories;

use App\Models\Contactos;
use App\Models\Detallecitas;
use App\Models\Detallecontactos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetallecitasFactory extends Factory
{
    protected $model = Detallecitas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $currentId = 1;

        if ($currentId > 120) {
            $currentId = 1;
        }

        $citasId = $currentId;
        $currentId++;

        return [
            'fecha' => $this->faker->date(),
            'horaInicio' => $this->faker->time(),
            'horaFin' => $this->faker->time(),
            'estado' => $this->faker->randomElement(['Programada', 'Cancelada', 'Realizada', 'Por autorizar']),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'observaciones' => $this->faker->paragraph(),
            'contactos_id' => rand(Contactos::min('id'), Contactos::max('id')),
            'citas_id' => $citasId,
            'users_id' => rand(User::min('id'), User::max('id')),
            'detallecontactos_id' => rand(Detallecontactos::min('id'), Detallecontactos::max('id'))
        ];
    }
}
