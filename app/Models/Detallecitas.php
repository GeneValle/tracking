<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 'hora_inicio', 'hora_fin',
    ];

    public function contacto()
    {
        return $this->belongsTo(Contactos::class, 'contactos_id');
    }

    public function usuario() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function cita()
    {
        return $this->belongsTo(Citas::class, 'citas_id');
    }

    public function detalleContacto()
    {
        return $this->belongsTo(Detallecontactos::class, 'detallecontactos_id');
    }
}
