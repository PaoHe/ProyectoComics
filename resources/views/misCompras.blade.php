<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Pow! Cómics - Tienda</title>
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
                <a href="{{ route(name: 'misCompras') }}" class="text-white hover:text-yellow-400">Mis Compras</a>
                <a href="{{ route('membresia') }}" class="text-white hover:text-yellow-400">Mi Membresía</a>
                <a href="{{ route('miPerfil') }}" class="text-white hover:text-yellow-400">Mi perfil</a>


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
                <div class="bg-white text-black p-4 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/Gotham Central (DC Omnibus).jpg') }}" alt="Gotham Central (DC Omnibus)" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-green-500 text-white px-2 py-1 rounded">
                        Estado: Entregado
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">Gotham Central (DC Omnibus)</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col. XX,  Calle: XX, No.XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <button class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">
                            ¿No recibiste el paquete?
                        </button>
                    </div>
                </div>

                <div class="bg-white text-black p-4 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/Box Long Halloween.jpeg') }}" alt="Box Long Halloween" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-green-500 text-white px-2 py-1 rounded">
                        Estado: Entregado
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">Box Long Halloween</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col.XX, Calle: XX, No.XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <button class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">
                            ¿No recibiste el paquete?
                        </button>
                    </div>
                </div>

                <div class="bg-white text-black p-4 rounded-lg shadow-lg flex items-center mb-6 relative">
                    <img src="{{ asset('imagenes/Batman De Doug Moench Vol.01.jpg') }}" alt="Batman De Doug Moench Vol.01" class="w-24 h-32 rounded mr-4 object-cover">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-green-500 text-white px-2 py-1 rounded">
                        Estado: Entregado
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg">Batman De Doug Moench Vol.01</h3>
                        <p class="text-gray-700 text-lg">Dirección: Col. XX, Calle: XX, No.XX</p>
                        <p class="text-gray-500">Fecha estimada de entrega: XX/XX/XXXX</p>
                        <button class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-300">
                            ¿No recibiste el paquete?
                        </button>
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