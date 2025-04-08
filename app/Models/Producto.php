<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleCompra;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // opcional si el nombre coincide
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'descripcion',
        'stock_actual',
        'precio',
        'editorial_o_marca',
        'fecha_lanzamiento',
        'imagen_url',
        'id_proveedor',
        'sku',
    ];

    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_producto');
    }

}
