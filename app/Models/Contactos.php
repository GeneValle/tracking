<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;

    public function descartado()
    {
        return $this->hasMany(Descartados::class, 'contactos_id');
    }
    
    public function detalleCita()
    {
        return $this->hasMany(Detallecitas::class, 'contactos_id');
    }

    public function detalleContacto()
    {
        return $this->hasOne(Detallecontactos::class, 'contactos_id');
    }

    public function detalleVentas() {
        return $this->belongsTo(Detalleventas::class, 'detalleventas_id');
    }

    public function origen() {
        return $this->hasMany(Origenes::class, 'contactos_id');
    }

    public function venta()
    {
        return $this->hasMany(Ventas::class, 'ventas_id')->onDelete('cascade');
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizaciones::class, 'contactos_id');
    }

    public function detallePreferencia()
    {
        return $this->hasMany(Detallepreferencias::class, 'detallepreferencias_id')->onDelete('cascade');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'empresas_id');
    }

    public function colonia() {
        return $this->belongsTo(Colonias::class, 'colonias_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    protected $fillable = ['funeraria', 'nombre', 'tipo', 'correo', 'telefono', 'celular', 'referenciado', 'origen', 'fechaNacimiento', 'fechaIngreso', 'vigencia', 'profesion', 'empresas_id', 'ingresos', 'calle', 'noExterior', 'noInterior', 'colonias_id', 'localidad', 'municipio', 'estado', 'pais', 'codPostal', 'observaciones', 'users_id'];

    protected $dates = ['vigencia'];
}
