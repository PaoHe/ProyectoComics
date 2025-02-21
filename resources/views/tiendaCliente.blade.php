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
<body class="bg-gray-900 text-white">
    <div class="relative min-h-screen flex flex-col" 
         style="background-image: url('{{ asset('Fondo 1.png') }}'); 
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

        <div class="relative z-10 flex flex-grow">
            <aside class="w-1/5 bg-gray-800 p-6">
                <h2 class="text-lg font-bold mb-4">Filtros</h2>
                
                <div class="mb-4">
                    <h3 class="font-semibold mb-2">Categoría</h3>
                    <ul class="space-y-2">
                        <li><input type="checkbox" checked> Universos</li>
                        <li><input type="checkbox"> Deportes</li>
                        <li><input type="checkbox"> Entretenimiento</li>
                    </ul>
                </div>
            </aside>

            <main class="w-4/5 p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white text-black p-4 rounded shadow-lg">
                    <img src="deadpool.jpg" alt="Deadpool Vol.05" class="w-full rounded mb-2">
                    <h3 class="font-bold">Deadpool Vol.05</h3>
                    <p class="text-gray-700">$299.00</p>
                    <span class="text-yellow-500 font-semibold">Pre-Venta</span>
                </div>

                <div class="bg-white text-black p-4 rounded shadow-lg">
                    <img src="hulk.jpg" alt="Incredible Hulk Vol.01" class="w-full rounded mb-2">
                    <h3 class="font-bold">Incredible Hulk Vol.01</h3>
                    <p class="text-gray-700">$399.00</p>
                    <span class="text-yellow-500 font-semibold">Pre-Venta</span>
                </div>

                <div class="bg-white text-black p-4 rounded shadow-lg">
                    <img src="starwars.jpg" alt="Star Wars" class="w-full rounded mb-2">
                    <h3 class="font-bold">Star Wars De Gillen & Pak</h3>
                    <p class="text-gray-700">$1,533.00</p>
                </div>
            </main>
        </div>

        <footer class="relative z-10 bg-black p-6 text-center">
            <h2 class="font-bold text-white">Preventas Exclusivas</h2>
            <ul class="text-gray-400 text-sm space-y-1">
                <li>DC Comics</li>
                <li>Marvel Comics</li>
                <li>Panini Comics</li>
            </ul>
        </footer>
    </div>
</body>
</html>