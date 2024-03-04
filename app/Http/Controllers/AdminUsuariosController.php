<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminUsuariosController extends Controller
{
    public function adminUsuarios()
    {
        // $estadoCivilUsuario = DB::table('users')->distinct()->pluck('estadoCivil');
        $puestoUsuario = DB::table('users')->distinct()->pluck('puesto');
        $usuarios = User::all();

        return view('adminUsuarios', compact('puestoUsuario', 'usuarios'));
    }

    public function storeAdminUsuarios(Request $request)
    {
        $usuario = new User();

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->profesion = $request->profesion;
        $usuario->password = $request->password;
        $usuario->telefono = $request->telefono;
        $usuario->puesto = $request->puesto;

        $usuario->save();

        return redirect()->route('adminUsuarios');
    }

    public function editAdminUsuarios(User $usuario)
    {
        return view('adminUsuarios', compact('usuario'));
    }

    public function updateAdminUsuarios(User $usuario, Request $request)
    {
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->profesion = $request->profesion;
        $usuario->password = $request->password;
        $usuario->telefono = $request->telefono;
        $usuario->puesto = $request->puesto;

        $usuario->save();

        return redirect()->route('adminUsuarios');
    }

    public function destroyAdminUsuarios(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('adminUsuarios');
    }
}
