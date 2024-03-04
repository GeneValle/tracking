<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origenes extends Model
{
    use HasFactory;

    public function contactos() {
        return $this->belongsTo(Contactos::class, 'contactos_id');
    }

    public function detalleContactos()
    {
        return $this->hasMany(Detallecontactos::class, 'origenes_id');
    }
}
