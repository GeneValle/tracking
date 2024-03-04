<?php

namespace App\Http\Controllers;

use App\Models\Origenes;
use App\Models\Contactos;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class OrigenesController extends Controller
{
    public function origenes()
    {
        $origenes = Origenes::all();

        return view('origenes', compact('origenes'));
    }

    public function storeOrigenes(Request $request)
    {
        $origen = new Origenes();

        $faker = Faker::create();

        $origen->origen = $request->origen;
        $origen->contactos_id = $faker->numberBetween(Contactos::min('id'), Contactos::max('id'));

        $origen->save();

        return redirect()->route('origenes');
    }

    public function editOrigenes(Origenes $origen)
    {
        return view('origenes', compact('origen'));
    }

    public function updateOrigenes(Request $request, Origenes $origen)
    {
        $origen->origen = $request->origen;

        $origen->save();
        return redirect()->route('origenes');
    }

    public function destroyOrigenes(Origenes $origen)
    {
        $origen->delete();

        return redirect()->route('origenes');
    }
}
