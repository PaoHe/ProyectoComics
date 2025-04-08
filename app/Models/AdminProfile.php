<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'encargado',
        'correo',
        'telefono',
        'direccion',
        'estatus',
        'razon_social',
    ];
}