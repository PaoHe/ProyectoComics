<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Mi Perfil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-shadow {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <div class="relative flex flex-col flex-grow" 
         style="background-image: url('Fondo 1.png'); 
                background-size: auto;
                background-repeat: repeat;
                background-position: center;">
        
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <nav class="relative z-10 bg-black p-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-shadow">¡<span class="text-yellow-400">Pow</span>! Cómics</div>
            
            <div class="flex items-center space-x-6">
                <a href="#" class="text-white hover:text-yellow-400">Cómics</a>
                <a href="#" class="text-white hover:text-yellow-400">Pedidos</a>
                <a href="#" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="#" class="text-white hover:text-yellow-400">Miembro</a>
                <a href="#" class="text-white hover:text-yellow-400">Mi perfil</a>

                <div class="relative">
                    <input type="text" placeholder="Buscar..." class="px-4 py-2 rounded text-black">
                    <button class="absolute right-2 top-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path d="M23 21l-6-6m2-6a9 9 0 1 0-9 9 9 9 0 0 0 9-9z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div class="relative z-10 flex flex-grow p-6 space-x-6">
            <main class="flex-grow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Usuario</h2>
                    <p>{{ $usuario }}</p>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Nombre</h2>
                    <p>{{ $nombre }}</p>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Correo</h2>
                    <p>{{ $correo }}</p>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Teléfono y dirección</h2>
                    <p>{{ $telefono }}</p>
                    <p>{{ $direccion }}</p>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Membrería</h2>
                    <p>{{ $membreria }}</p>
                    # cambiar la ruta 
                    <a href="{{ route('cambiar_plan') }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded">Cambiar tu plan</a>
                </div>
                <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                    <h2 class="font-bold text-lg">Método de Pago</h2>
                    <p>{{ $metodo_pago }}</p>
                </div>
            </main>
        </div>
    </div>

    <footer class="bg-black text-white py-6 mt-auto">
        <div class="text-center">
            <h3 class="font-bold text-lg">Preventas Exclusivas</h3>
            <p>DC Comics</p>
            <p>Marvel Comics</p>
            <p>Panini Comics</p>
        </div>
    </footer>
</body>
</html>