<?php

namespace Database\Factories;

use App\Models\Colonias;
use App\Models\Contactos;
use App\Models\Empresas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactosFactory extends Factory
{
    protected $model = Contactos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'funeraria' =>$this->faker->company(),
            'nombre'  => $this->faker->name(),
            'tipo' => $this->faker->randomElement(['Candidato', 'Prospecto', 'Cliente', 'Descartado']),
            'correo'  => $this->faker->unique()->safeEmail(),
            'telefono'  => $this->faker->unique()->phoneNumber(),
            'celular'  => $this->faker->unique()->phoneNumber(),
            'referenciado' => $this->faker->sentence(),
            'origen' => $this->faker->word(),
            'fechaNacimiento' => $this->faker->date(),
            'fechaIngreso' => $this->faker->date(),
            'vigencia' => $this->faker->date(),
            'profesion' => $this->faker->word(),
            'ingresos' => $this->faker->randomFloat(2, 1000, 100000),
            'calle' => $this->faker->streetName(),
            'noExterior' => $this->faker->buildingNumber(),
            'noInterior' => $this->faker->buildingNumber(),
            'colonias_id' => rand(Colonias::min('id'), Colonias::max('id')),
            'localidad' => $this->faker->city(),
            'municipio' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'pais' => $this->faker->country(),
            'codPostal' => $this->faker->numberBetween(1000,100000),
            'observaciones' => $this->faker->paragraph(),

            'users_id' => rand(User::min('id'), User::max('id')),
            'empresas_id' => rand(Empresas::min('id'), Empresas::max('id'))
        ];
    }
}
