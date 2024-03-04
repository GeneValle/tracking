<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    public function detalleContacto()
    {
        return $this->hasMany(Detallecontactos::class)->onDelete('cascade');
    }

    public function detalleVentas() {
        return $this->hasOne(Detalleventas::class)->onDelete('cascade');;
    }

    public function contacto() {
        return $this->belongsTo(Contactos::class,'contactos_id');
    }

    public function usuario() {
        return $this->belongsTo(User::class,'users_id');
    }
}
