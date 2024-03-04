<?php

namespace Database\Seeders;

use App\Models\Citas;
use App\Models\Colonias;
use App\Models\Contactos;
use App\Models\Cotizaciones;
use App\Models\Descartados;
use App\Models\Detallecitas;
use App\Models\Detallecontactos;
use App\Models\Detallepreferencias;
use App\Models\Detalleventas;
use App\Models\Empresas;
use App\Models\Origenes;
use App\Models\Preferencias;
use App\Models\Productos;
use App\Models\TipoCausas;
use App\Models\Tipocitas;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Colonias::factory(5)->create();
        Empresas::factory(12)->create();
        Productos::factory(2)->create();
        User::factory(10)->create();
        /*$usuarios = Usuarios::all();
        // Itera sobre cada usuario
         foreach ($usuarios as $usuario) {
            if (\Illuminate\Support\Facades\Hash::needsRehash($usuario->password)) {
                $usuario->password = bcrypt($usuario->password); // Encripta la contraseña
                $usuario->save();
            }
        } */
        Contactos::factory(81)->create();
        Origenes::factory(10)->create();
        Cotizaciones::factory(14)->create();
        $descartadosIds = Contactos::where('tipo', 'Descartado')->pluck('id');
        foreach ($descartadosIds as $contactoId) {
            Descartados::factory()->create(['contactos_id' => $contactoId]);
        }
        // Descartados::factory(8)->create();
        Ventas::factory(15)->create();
        Citas::factory(120)->create();
        Detallecontactos::factory(81)->create();
        Detalleventas::factory(15)->create();
        Detallecitas::factory(120)->create();
        Detallepreferencias::factory(3)->create();
        Tipocitas::factory(5)->create();
        Tipocausas::factory(3)->create();
        Preferencias::factory(3)->create();
    }
}
