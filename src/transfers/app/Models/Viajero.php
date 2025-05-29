<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viajero extends Model
{
    use HasFactory;
    //nombre de la tabla en bbdd
    protected $table = 'transfer_viajeros';
    //campos que se pueden rellenar
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'direccion',
        'codigoPostal',
        'ciudad',
        'email',
        'password',
        'rol'
        ];
}
