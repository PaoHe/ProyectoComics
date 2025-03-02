<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $producto['nombre'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <div class="relative flex flex-col flex-grow" 
         style="background-image:  url('{{ asset('Fondo 1.png') }}'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">

        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

        <nav class="relative z-20 bg-black p-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-shadow">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('tiendaCliente') }}" class="text-white hover:text-yellow-400">Cómics</a>
                <a href="#" class="text-white hover:text-yellow-400">Pedidos</a>
                <a href="#" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-white hover:text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
            </div>
        </nav>

        <div class="flex-grow flex flex-col items-center p-6 relative z-20">
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-3xl w-full">
                <div class="flex flex-col lg:flex-row items-center lg:items-start">
                    <img src="{{ asset('imagenes/' . $producto['imagen']) }}" alt="{{ $producto['nombre'] }}" class="w-64 h-80 rounded-lg mb-6 lg:mb-0 lg:mr-6 object-cover shadow-lg">
                    <div class="text-center lg:text-left">
                        <h1 class="text-3xl font-bold mb-4">{{ $producto['nombre'] }}</h1>
                        <p class="text-yellow-400 text-2xl font-semibold mb-4">{{ $producto['precio'] }}</p>
                        <p class="text-gray-300 mb-6">{{ $producto['descripcion'] }}</p>
                        <div class="mb-4">
                            <label for="cantidad" class="text-gray-300 text-lg block mb-2">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" min="1" value="1" class="bg-gray-700 text-white text-lg px-4 py-2 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                        </div>
                        <div class="flex flex-col space-y-6 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg shadow-lg transition">Comprar Ahora</button>
                            <button class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition">Añadir al Carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <footer class="bg-black text-white py-6">
        <div class="text-center">
            <h3 class="font-bold text-lg">Preventas Exclusivas</h3>
            <p>DC Comics</p>
            <p>Marvel Comics</p>
            <p>Panini Comics</p>
        </div>
     </footer>
    </div>
</body>
</html>