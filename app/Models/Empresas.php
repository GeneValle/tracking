<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    public function contactos()
    {
        return $this->hasMany(Contactos::class, 'empresas_id');
    }

    public function detalleContactos()
    {
        return $this->hasMany(Detallecontactos::class, 'empresas_id');
    }

    public function colonia()
    {
        return $this->belongsTo(Colonias::class, 'colonias_id');
    }
}
