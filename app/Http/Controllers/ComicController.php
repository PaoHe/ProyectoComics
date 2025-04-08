<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Producto;
use App\Models\Proveedor;

class ComicController extends Controller
{
    protected $productos = [
        1 => [
            'titulo' => 'Deadpool Vol.05',
            'precio' => 299.00,
            'descripcion' => 'Es insoportable, peligroso y... huele fatal. Pero al público le encanta...',
            'imagen' => 'DeadpoolVol5.jpg',
        ],
        2 => [
            'titulo' => 'Incredible Hulk Vol.01',
            'precio' => 399.00,
            'descripcion' => 'Mientras un enfurecido Hulk intenta tomar el control permanente...',
            'imagen' => 'HulkVol1.jpg',
        ],
        3 => [
            'titulo' => 'Star Wars De Gillen & Pak',
            'precio' => 1533.00,
            'descripcion' => 'Con la tensión en aumento en la Galaxia, la Princesa Leia, Luke Skywalker y sus aliados...',
            'imagen' => 'StarWarsGillenPak.jpg',
        ],
        4 => [
            'titulo' => 'The Amazing Spider-Man #25',
            'precio' => 79.00,
            'descripcion' => 'Este número marca el inicio de una etapa crucial en Amazing Spider-Man. Peter Parker...',
            'imagen' => 'The Amazing Spider-Man.jpeg',
        ],
        5 => [
            'titulo' => 'Punisher De Mike Baron',
            'precio' => 579.00,
            'descripcion' => 'La cruzada de Punisher contra el crimen lo lleva cara a cara con un cartel de la droga boliviano.',
            'imagen' => 'Punisher De Mike Baron.jpeg',
        ],
        6 => [
            'titulo' => 'Daredevil Vol.01',
            'precio' => 1235.00,
            'descripcion' => 'Es una nueva era para Nueva York y para el Hombre Sin Miedo...',
            'imagen' => 'Daredevil Vol.01.jpeg',
        ],
    ];

    public function show($id)
    {
        if (!isset($this->productos[$id])) {
            abort(404);
        }

        $producto = $this->productos[$id];
        $producto['id'] = $id;

        return view('compraComic', compact('producto'));
    }

    public function pagarConPaypal($id)
    {
        if (!isset($this->productos[$id])) {
            abort(404);
        }

        $producto = $this->productos[$id];
        $producto['id'] = $id;

        $response = Http::post(route('paypal.createOrder'), [
            'price' => $producto['precio'],
            'currency' => 'MXN', 
        ]);

        if ($response->ok()) {
            $approvalUrl = $response->json()['approval_url'];
            return redirect()->away($approvalUrl); 
        } else {
            return redirect()->route('comic.show', $id)->with('error', 'Hubo un problema al procesar el pago');
        }
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('comicsRegistro', compact('proveedores'));
    }

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
            'sku' => 'nullable|string|max:100|unique:productos,sku',
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

        return redirect()->route('comicsRegistro')->with('success', 'Cómic guardado correctamente.');
    }
}
