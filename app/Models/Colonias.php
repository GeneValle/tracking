<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonias extends Model
{
    use HasFactory;
    
    public function contactos() {
        return $this->hasMany(Contactos::class, 'colonias_id');
    }

    public function empresas() {
        return $this->hasMany(Empresas::class, 'colonias_id');
    }

    public function detalleContactos()
    {
        return $this->hasMany(Detallecontactos::class, 'colonias_id');
    }
}
