<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecontactos extends Model
{
    use HasFactory;

    public function contacto()
    {
        return $this->belongsTo(Contactos::class, 'contactos_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function cita()
    {
        return $this->belongsTo(Citas::class, 'citas_id');
    }

    public function venta()
    {
        return $this->belongsTo(Ventas::class, 'ventas_id');
    }

    public function colonia()
    {
        return $this->belongsTo(Colonias::class, 'colonias_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'empresas_id');
    }

    public function origenes()
    {
        return $this->belongsTo(Origenes::class, 'origenes_id');
    }

    public function detalleCita()
    {
        return $this->hasMany(Detallecitas::class, 'detallecontactos_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(Detalleventas::class, 'detallecontactos_id');
    }
}
