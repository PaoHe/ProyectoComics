<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCompra extends Model
{
    protected $table = 'historial_compras';
    protected $primaryKey = 'id'; // o el nombre real si es diferente
    public $timestamps = false;
}
