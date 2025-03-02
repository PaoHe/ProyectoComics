<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiPerfilController extends Controller
{
    public function index()
    {
        $usuario = 'Usuario01';
        $nombre = 'Rachel ';
        $apellido = 'Zane Ross';
        $correo = 'reachel.zane@gmail.com';
        $telefono = '442 152 8759';
        $direccion = 'Calle Universo, No. 123';
        $membreria = 'Básico';
        $metodo_pago = 'Tarjeta: **** **** **** 9057';
        $banco = 'Banamex';

        return view('miPerfil', compact('usuario', 'nombre', 'correo', 'telefono', 'direccion', 'membreria', 'metodo_pago', 'apellido','banco'));
    }
}