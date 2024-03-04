<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function productos()
    {
        $productos = Productos::all();

        return view('productos', compact('productos'));
    }

    public function storeProductos(Request $request)
    {
        $producto = new Productos();

        $producto->producto = $request->producto;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        $producto->save();

        return redirect()->route('productos');
    }

    public function editProductos(Productos $producto)
    {
        return view('productos', compact('producto'));
    }

    public function updateProductos(Productos $producto, Request $request)
    {
        $producto->producto = $request->producto;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        $producto->save();

        return redirect()->route('productos');
    }

    public function destroyProductos(Productos $producto)
    {
        $producto->delete();

        return redirect()->route('productos');
    }
}
