<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    // Muestra el formulario de contacto
    public function formulario()
    {
        return view('contacto.formulario'); // Asegúrate que esta vista exista
    }

    // Procesa el envío del formulario
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Enviar el correo
        Mail::raw("Mensaje de: {$request->nombre}\n\n{$request->mensaje}", function ($message) use ($request) {
            $message->to('powcomics367@gmail.com') 
                    ->subject("Nuevo mensaje de contacto de {$request->nombre}")
                    ->replyTo($request->email);
        });

        return redirect()->back()->with('success', '¡Tu mensaje fue enviado correctamente!');
    }
}