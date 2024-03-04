<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Tipocitas;
use Illuminate\Http\Request;
use Faker\Factory as faker;

class TipoCitasController extends Controller
{
    public function tipoCita()
    {
        $tipoCitas = Tipocitas::all();

        return view('tipoCita', compact('tipoCitas'));
    }

    public function storeTipoCita(Request $request)
    {
        $tipoCita = new Tipocitas();

        $faker = Faker::create();

        $tipoCita->tipoCita = $request->tipoCita;
        $tipoCita->duracion = $request->duracion;
        $tipoCita->citas_id = $faker->numberBetween(Citas::min('id'), Citas::max('id'));

        $tipoCita->save();

        return redirect()->route('tipoCita');
    }

    public function editTipoCita(Tipocitas $tipoCita)
    {
        return view('tipoCita', compact('tipoCita'));
    }

    public function updateTipoCita(Tipocitas $tipoCita, Request $request)
    {
        $tipoCita->tipoCita = $request->tipoCita;
        $tipoCita->duracion = $request->duracion;

        $tipoCita->save();

        return redirect()->route('tipoCita');
    }

    public function destroyTipoCita(Tipocitas $tipoCita)
    {
        $tipoCita->delete();

        return redirect()->route('tipoCita');
    }
}
