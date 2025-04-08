<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id'; // cámbialo si tu tabla tiene otro PK
    public $timestamps = false;
}
