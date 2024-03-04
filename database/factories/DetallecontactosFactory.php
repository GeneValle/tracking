<?php

namespace Database\Factories;

use App\Models\Citas;
use App\Models\Colonias;
use App\Models\Detallecontactos;
use App\Models\Empresas;
use App\Models\Origenes;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetallecontactosFactory extends Factory
{
    protected $model = Detallecontactos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $currentId = 1;

        if ($currentId > 81) {
            $currentId = 1;
        }

        $contactosId = $currentId;
        $currentId++;
        return [
            'funeraria' => $this->faker->word(),
            'nombre' => $this->faker->name(),
            'estado' => $this->faker->randomElement(['activo', 'por autorizar']),
            'contactos_id' => $contactosId,
            'colonias_id' => Colonias::pluck('id')->random(),
            'empresas_id' => Empresas::pluck('id')->random(),
            'origenes_id' => Origenes::pluck('id')->random(),
            'citas_id' => rand(Citas::min('id'), Citas::max('id')),
            'ventas_id' => rand(Ventas::min('id'), Ventas::max('id')),
            'users_id' => rand(User::min('id'), User::max('id'))
        ];
    }
}
