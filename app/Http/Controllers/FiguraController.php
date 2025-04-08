<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;

class FiguraController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock_actual' => 'required|integer|min:1|max:100',
            'imagen' => 'nullable|image|max:2048',
            'descripcion' => 'nullable|string',
            'editorial_o_marca' => 'nullable|string|max:100',
            'fecha_lanzamiento' => 'nullable|date',
            'sku' => 'nullable|string|max:100',
            'id_proveedor' => 'nullable|exists:proveedores,id_proveedor'
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock_actual' => $request->stock_actual,
            'imagen_url' => $rutaImagen,
            'descripcion' => $request->descripcion,
            'editorial_o_marca' => $request->editorial_o_marca,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'sku' => 'nullable|string|max:100|unique:productos,sku',

            'id_proveedor' => $request->id_proveedor
        ]);

        return redirect()->route('figurasRegistro')->with('success', 'Figura guardada correctamente.');
    }

    public function create()
    {
        $proveedores = \App\Models\Proveedor::all();
        return view('figurasRegistro', compact('proveedores'));
    }
}