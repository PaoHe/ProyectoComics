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
            <a href="{{ route('tiendaCliente') }}" class="text-white hover:text-yellow-400">Cómics</a>
            <a href="{{ route('misPedidos') }}" class="text-white hover:text-yellow-400">Mis Pedidos</a>
            <a href="{{ route('misCompras') }}" class="text-white hover:text-yellow-400">Mis Compras</a>
            <a href="{{ route('membresia') }}" class="text-white hover:text-yellow-400">Mi Membresía</a>
            <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>
            <a href="{{ route('carrito') }}" class="text-white hover:text-yellow-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-1.5 9H5.5L4 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4zm1-8h10M5 6h12" />
                </svg>
            </a>
            
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

    <div class="relative z-10 flex flex-col items-center justify-center p-6">
        <main class="bg-white text-black p-12 rounded-lg shadow-lg w-full max-w-2xl mx-auto mt-10">
            <h2 class="font-bold text-xl text-center mb-4">Mi Perfil</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
                <div class="flex flex-col space-y-4">
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Usuario:</li>
                        </ul>
                        <p>{{ $usuario }}</p>
                    </div>
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Nombre:</li>
                        </ul>
                        <p>{{ $nombre }}</p>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Apellido:</li>
                        </ul>
                        <p>{{ $apellido }}</p>
                    </div>
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Correo:</li>
                        </ul>
                        <p>{{ $correo }}</p>
                    </div>
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Dirección:</li>
                        </ul>
                        <p>{{ $direccion }}</p>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Teléfono:</li>
                        </ul>
                        <p>{{ $telefono }}</p>
                    </div>
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Método de Pago:</li>
                        </ul>
                        <p>{{ $metodo_pago }}</p>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Banco:</li>
                        </ul>
                        <p>{{ $banco }}</p>
                    </div>
                    <div>
                        <ul class="list-disc pl-6">
                            <li class="font-bold text-lg">Membresía:</li>
                        </ul>
                        <p>{{ $membreria }}</p>
                        <div class="mt-6 flex justify-center">
                            <a href="{{ route('membresia') }}" class="bg-yellow-400 text-black px-4 py-2 rounded">
                                Cambiar tu plan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center self-center">
                    <img src="imagenes/miperfil.jpg" alt="miperfil" class="w-203 h-203 rounded-lg">
                </div>
            </div>
        </main>

        <div class="mt-4 w-full flex justify-end">
            <a href="{{ route('login') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400">
                Cerrar sesión
            </a>
        </div>
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