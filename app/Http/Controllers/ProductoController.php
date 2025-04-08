<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\DetalleCompra;
use App\Models\DetallePedido;
use App\Models\HistorialCompra;
use App\Models\Inventario;
use App\Models\ProductoCategoria; 

class ProductoController extends Controller
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
            'sku' => $request->sku,
            'id_proveedor' => $request->id_proveedor
        ]);

        return redirect()->route('todosProductos')->with('success', 'Producto guardado correctamente.');
    }

    
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $proveedores = Proveedor::all();
        return view('editarProducto', compact('producto', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock_actual' => 'required|integer|min:1|max:100',
            'imagen' => 'nullable|image|max:2048',
            'descripcion' => 'nullable|string',
            'editorial_o_marca' => 'nullable|string|max:100',
            'fecha_lanzamiento' => 'nullable|date',
            'sku' => 'nullable|string|max:100|unique:productos,sku,' . $id . ',id_producto',
            'id_proveedor' => 'nullable|exists:proveedores,id_proveedor'
        ]);

        $producto = Producto::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen_url = $rutaImagen;
        }

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock_actual = $request->stock_actual;
        $producto->descripcion = $request->descripcion;
        $producto->editorial_o_marca = $request->editorial_o_marca;
        $producto->fecha_lanzamiento = $request->fecha_lanzamiento;
        $producto->sku = $request->sku;
        $producto->id_proveedor = $request->id_proveedor;

        $producto->save();

        return redirect()->route('todosProductos')->with('success', 'Producto actualizado correctamente.');
    }



    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->paginate(6);
        return view('todosProductos', compact('productos'));
    }

    public function destroy($id)
    {

        // Eliminar registros relacionados
        DetalleCompra::where('id_producto', $id)->delete();
        DetallePedido::where('id_producto', $id)->delete();
        HistorialCompra::where('id_producto', $id)->delete();
        Inventario::where('id_producto', $id)->delete();
        ProductoCategoria::where('id_producto', $id)->delete();

        // Eliminar el producto
        \App\Models\Producto::where('id_producto', $id)->delete();

        return redirect()->route('todosProductos')->with('success', 'Producto eliminado correctamente.');

    }
}