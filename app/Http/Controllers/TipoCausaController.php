<?php

namespace App\Http\Controllers;

use App\Models\Tipocausas;
use Illuminate\Http\Request;

class TipoCausaController extends Controller
{
    public function tipoCausa()
    {
        $tipoCausas = Tipocausas::all();
        return view('tipoCausa', compact('tipoCausas'));
    }

    public function storeTipoCausa(Request $request)
    {
        $tipoCausa = new Tipocausas();
        $tipoCausa->tipoCausa = $request->tipoCausa;

        $tipoCausa->save();
        return redirect()->route('tipoCausa');
    }

    public function editTipoCausa(Tipocausas $tipoCausa)
    {
        return view('tipoCausa', compact('tipoCausa'));
    }

    public function updateTipoCausa(Tipocausas $tipoCausa, Request $request)
    {
        $tipoCausa->tipoCausa = $request->tipoCausa;

        $tipoCausa->save();
        return redirect()->route('tipoCausa');
    }

    public function destroyTipoCausa(Tipocausas $tipoCausa)
    {
        $tipoCausa->delete();

        return redirect()->route('tipoCausa');
    }
}
