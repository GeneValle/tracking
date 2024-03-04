<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    public function detalleCita() {
        return $this->hasOne(Detallecitas::class, 'detallecitas_id')->onDelete('cascade');;
    }

    public function detalleContacto()
    {
        return $this->hasMany(Detallecontactos::class, 'detallecontactos_id')->onDelete('cascade');;
    }

    public function tipoCita()
    {
        return $this->hasMany(Tipocitas::class, 'tipocitas_id')->onDelete('cascade');;
    }
    
    protected $fillable = [
        'tipo',
    ];
}
