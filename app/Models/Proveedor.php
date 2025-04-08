<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    
    protected $primaryKey = 'id_proveedor';
    
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'contacto',
        'direccion',
        'fecha_ultimo_abastecimiento',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor');
    }
}
