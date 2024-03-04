<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventas extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'productos_id');
    }

    public function contactos()
    {
        return $this->hasMany(Contactos::class, 'detalleventas_id');
    }

    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'ventas_id');
    }

    public function detalleContacto()
    {
        return $this->belongsTo(Detallecontactos::class, 'detallecontactos_id');
    }
}
