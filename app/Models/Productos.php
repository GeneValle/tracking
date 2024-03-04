<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public function cotizacion() {
        return $this->hasMany(Cotizaciones::class, 'cotizaciones_id')->ondelete('cascade');
    }

    public function detalleVentas() {
        return $this->hasMany(Detalleventas::class, 'productos_id');
    }
}
