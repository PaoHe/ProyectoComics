<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figura extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'precio', 'cantidad', 'descripcion', 'tamano', 'material', 'peso', 'modelo', 'imagen'
    ];
}
