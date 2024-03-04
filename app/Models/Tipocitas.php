<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipocitas extends Model
{
    use HasFactory;

    public function cita() {
        return $this->belongsTo(Citas::class, 'citas_id');
    } 
}
