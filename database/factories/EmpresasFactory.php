<?php

namespace Database\Factories;

use App\Models\Colonias;
use App\Models\Empresas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpresasFactory extends Factory
{
    protected $model = Empresas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreEmpresa'  =>$this->faker->company(),
            'giro' =>$this->faker->randomElement(['Cremación', 'Floristería', 'Venta', 'Servicios de planificación y previsión funeraria']),
            'sitioWeb' =>$this->faker->sentence(),
            'calle' =>$this->faker->streetName(),
            'noExterior' =>$this->faker->buildingNumber(),
            'noInterior' =>$this->faker->buildingNumber(),
            'colonias_id' => rand(Colonias::max('id'), Colonias::min('id')),
            'ciudad' =>$this->faker->city(),
            'municipio' =>$this->faker->city(),
            'estado' =>$this->faker->state(),
            'codPostal' =>$this->faker->numberBetween(10000,100000),
            'pais' =>$this->faker->country(),
            'observaciones' =>$this->faker->paragraph(),
        ];
    }
}
