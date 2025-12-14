<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'placa',
        'tipo',
        'propietario',
        'observaciones'
    ];
}
