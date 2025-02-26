<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $productos = [
        1 => [
            'nombre' => 'Deadpool Vol.05',
            'precio' => '$299.00',
            'descripcion' => 'Es insoportable, peligroso y... huele fatal. Pero al público le encanta. 
            Sin embargo, la fama no viene sola, y ahora Deadpool debe lidiar con las responsabilidades que trae la popularidad. 
            Para ello, decide pedir ayuda, pero... nunca adivinarás a quién se la pidió. 
            Si eso no fuera suficiente, un impostor amenaza con destruir la reputación de Wade, y nuestro peculiar héroe tiene un plan maestro: 
            ¡usar a su hija Ellie como cebo para atrapar al culpable! Y, además, por si eso fuera poco,',
            'imagen' => 'Deadpool Vol.05.jpg',
        ],
        2 => [
            'nombre' => 'Incredible Hulk Vol.01',
            'precio' => '$399.00',
            'descripcion' => 'Mientras un enfurecido Hulk intenta tomar el control permanente del cuerpo que comparte con Bruce Banner, 
            un misterioso inmortal pone a todos los monstruos de la Tierra en su contra en un intento por liberar a su creadora, 
            la primordial Madre de los Horrores. Con ayuda de una nueva e insólita amistad, Banner debe impedir que el mundo se sumerja en la oscuridad.',
            'imagen' => 'Incredible Hulk Vol.01.jpg',
        ],
        3 => [
            'nombre' => 'Star Wars De Gillen & Pak',
            'precio' => '$1,533.00',
            'descripcion' => 'Con la tensión en aumento en la Galaxia, la Princesa Leia, Luke Skywalker y sus aliados buscan una nueva base para la Alianza Rebelde,
            lo que los lleva a las ruinas de Jedha, la luna devastada por la Estrella de la Muerte, el planeta minero Shu-Torun, ¡y hasta el mundo cubierto en agua de Mon Cala!',
            'imagen' => 'Star Wars De Gillen & Pak.jpeg',
        ],
        4 => [
            'nombre' => 'The Amazing Spider-Man #25',
            'precio' => '$79.00',
            'descripcion' => 'Este número marca el inicio de una etapa crucial en Amazing Spider-Man que no querrás perderte. Peter Parker se adentra en su lado más oscuro, 
            y las consecuencias comienzan a desenredarse.',
            'imagen' => 'The Amazing Spider-Man.jpeg',
        ],
        5 => [
            'nombre' => 'Punisher De Mike Baron',
            'precio' => '$579.00',
            'descripcion' => 'La cruzada de Punisher contra el crimen lo lleva cara a cara con un cartel de la droga boliviano, y para Frank Castle, 
            su viaje a Sudamérica no será precisamente una visita de placer.',
            'imagen' => 'Punisher De Mike Baron.jpeg',
        ],
        6 => [
            'nombre' => 'Daredevil Vol.01',
            'precio' => '$1,235.00',
            'descripcion' => 'Es una nueva era para Nueva York y para el Hombre Sin Miedo. Matt Murdock no tiene más opción que dejar atrás todo lo que ha conocido, 
            y Elektra es el último vestigio de su vida pasada. Todo lo que Matt creía saber sobre lo que significa ser Daredevil está a punto de cambiar. ',
            'imagen' => 'Daredevil Vol.01.jpeg',
        ]
    ];

    public function show($id)
    {
        if (!isset($this->productos[$id])) {
            abort(404);
        }

        $producto = $this->productos[$id];
        return view('compraComic', compact('producto'));
    }
}