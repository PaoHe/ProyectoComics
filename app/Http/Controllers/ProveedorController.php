<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.listaProveedores', compact('proveedores'));}

    public function create()
    {
        return view('proveedores.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'contacto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'fecha_ultimo_abastecimiento' => 'required|date',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', '¡Proveedor registrado correctamente!');
    }


    // Mostrar formulario de edición
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.editar', compact('proveedor'));
    }

    // Actualizar proveedor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'fecha_ultimo_abastecimiento' => 'required|date',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    // Eliminar proveedor
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}