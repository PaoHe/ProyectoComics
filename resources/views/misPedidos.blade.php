<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Mis Pedidos</title>
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

        <div class="relative z-10 flex flex-grow p-6">
            <main class="flex-grow space-y-6 mx-auto max-w-xl">
                <div class="bg-white text-black p-8 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/Star Wars-High Republic Shadow Of Starlight.jpeg') }}" alt="Star Wars: High Republic Shadow Of Starlight" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-yellow-500 text-white px-2 py-1 rounded">
                        Estado: En paquetería
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">Star Wars: High Republic Shadow Of Starlight</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col. XXXX  Calle: XX, No:XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <p class="text-gray-500">Rastrear desde paquetería: <a href="#" class="text-yellow-400 underline">Rastrear</a></p>
                    </div>
                </div>

                <div class="bg-white text-black p-8 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/the-ultimate-spider-man.jpeg') }}" alt="The Ultimate Spider-Man #04" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-blue-500 text-white px-2 py-1 rounded">
                        Estado: En reparto
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">The Ultimate Spider-Man #04</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col. XXXX  Calle: XX, No:XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <p class="text-gray-500">Rastrear desde paquetería: <a href="#" class="text-yellow-400 underline">Rastrear</a></p>
                    </div>
                </div>

                <div class="bg-white text-black p-8 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/justice-league-geoff-johns.jpeg') }}" alt="Justice League By Geoff Johns 1 (DC Omnibus)" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-gray-500 text-white px-2 py-1 rounded">
                        Estado: Pre-venta
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">Justice League By Geoff Johns 1 (DC Omnibus)</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col. XXXX  Calle: XX, No:XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <p class="text-gray-500">Rastrear desde paquetería: <a href="#" class="text-yellow-400 underline">Rastrear</a></p>
                    </div>
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