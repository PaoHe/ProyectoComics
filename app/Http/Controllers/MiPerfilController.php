<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiPerfilController extends Controller
{
    public function index()
    {
        $usuario = 'Usuario01';
        $nombre = 'Rachel Zane';
        $correo = 'usuario@gmail.com';
        $telefono = '442 999 9999';
        $direccion = 'Calle X, No. 123';
        $membreria = 'Básico';
        $metodo_pago = 'Tarjeta: **** **** **** 9099';

        return view('miPerfil', compact('usuario', 'nombre', 'correo', 'telefono', 'direccion', 'membreria', 'metodo_pago'));
    }
}