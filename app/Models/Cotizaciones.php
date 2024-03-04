<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;

    public function producto() {
        return $this->belongsTo(Productos::class, 'productos_id');
    }

    public function contacto() {
        return $this->belongsTo(Productos::class, 'contactos_id');
    }

    public function usuario() {
        return $this->belongsTo(Productos::class, 'productos_id');
    }
}
