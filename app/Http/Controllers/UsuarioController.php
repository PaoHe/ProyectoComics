<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // o tu modelo personalizado

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        // Validación simple
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|min:6'
        ]);

        // Crear usuario
        User::create([
            'nombre' => $request->name,
            'correo' => $request->email,
            'contraseña' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }
}
