<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminProfile;

class AdminProfileController extends Controller
{
    public function create()
    {
        return view('perfilAdmin');
    }
    
    public function edit()
    {
        $perfil = AdminProfile::first(); // o Auth::user()->perfil si hay auth
        
        // Si no existe, crear un perfil por defecto
        if (!$perfil) {
            $perfil = AdminProfile::create([
                'empresa' => 'Pow! Comics',
                'encargado' => 'Administrador',
                'correo' => 'admin@powcomics.com',
                'telefono' => '442-123-4567',
                'direccion' => 'Calle Principal #123',
                'estatus' => 'activo',
                'razon_social' => 'Pow Comics S.A. de C.V.'
            ]);
        }
        
        return view('perfilAdmin', compact('perfil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empresa' => 'required|string|max:255',
            'encargado' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:admin_profiles,correo,' . $id,
            'telefono' => 'nullable|regex:/^[0-9\s\-\+]{10,20}$/',
            'direccion' => 'nullable|string|max:255',
            'estatus' => 'required|string|in:activo,inactivo',
            'razon_social' => 'required|string|max:255',
        ]);
    
        $perfil = AdminProfile::findOrFail($id);
        $perfil->update($request->all());
    
        return redirect()->back()->with('success', '¡Perfil actualizado correctamente!');
    }
}