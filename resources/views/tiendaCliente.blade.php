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
            <aside class="w-64 bg-gray-800 p-6 rounded-lg shadow-lg hidden lg:block">
                <h2 class="text-lg font-bold mb-4 text-white">Filtros</h2>
                
                <div class="mb-4">
                    <h3 class="font-semibold mb-2">Categoría</h3>
                    <ul class="space-y-2">
                        <li><input type="checkbox" checked> Universos</li>
                        <li><input type="checkbox"> Deportes</li>
                        <li><input type="checkbox"> Entretenimiento</li>
                    </ul>

                    <h3 class="font-semibold mb-2">Precios</h3>
                    <ul class="space-y-2">
                        <li><input type="checkbox" checked> Menos de $199</li>
                        <li><input type="checkbox"> $200 a $500</li>
                        <li><input type="checkbox"> $500 a $999</li>
                        <li><input type="checkbox"> Más de $1,000</li>
                    </ul>

                    <h3 class="font-semibold mb-2">Año</h3>
                    <ul class="space-y-2">
                        <li><input type="checkbox"> 2019 y más</li>
                        <li><input type="checkbox" checked> 2020</li>
                        <li><input type="checkbox"> 2021</li>
                        <li><input type="checkbox"> 2022</li>
                        <li><input type="checkbox"> 2023</li>
                        <li><input type="checkbox"> 2024</li>
                        <li><input type="checkbox"> 2025</li>
                    </ul>

                    <h3 class="font-semibold mb-2">Frecuencia</h3>
                    <ul class="space-y-2">
                        <li><input type="checkbox"checked> 10</li>
                        <li><input type="checkbox"> 15</li>
                        <li><input type="checkbox"> 20</li>
                        <li><input type="checkbox"> 50</li>
                        <li><input type="checkbox"> 100</li>
                        <li><input type="checkbox"> 150</li>
                        <li><input type="checkbox"> 200</li>
                    </ul>
                </div>
            </aside>

            <main class="flex-grow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="1">>
                    <img src="Deadpool Vol.05.jpg" alt="Deadpool Vol.05" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">Deadpool Vol.05</h3>
                    <p class="text-gray-700 text-lg">$299.00</p>
                    <span class="text-yellow-500 font-semibold">Pre-Venta</span>
                    <a href="{{ route('compraComic', ['id' => 1]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="2">
                    <img src="Incredible Hulk Vol.01.jpg" alt="Incredible Hulk Vol.01" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">Incredible Hulk Vol.01</h3>
                    <p class="text-gray-700 text-lg">$399.00</p>
                    <span class="text-yellow-500 font-semibold">Pre-Venta</span>
                    <a href="{{ route('compraComic', ['id' => 2]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="3">
                    <img src="Star Wars De Gillen & Pak.jpeg" alt="Star Wars" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">Star Wars De Gillen & Pak</h3>
                    <p class="text-gray-700 text-lg">$1,533.00</p>
                    <a href="{{ route('compraComic', ['id' => 3]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
                </div>
                
                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="4">
                    <img src="The Amazing Spider-Man.jpeg" alt="The Amazing Spider-Man #25" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">The Amazing Spider-Man #25</h3>
                    <p class="text-gray-700 text-lg">$79.00</p>
                    <a href="{{ route('compraComic', ['id' => 4]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="5">
                    <img src="Punisher De Mike Baron.jpeg" alt="Punisher De Mike Baron" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">Punisher De Mike Baron</h3>
                    <p class="text-gray-700 text-lg">$579.00</p>
                    <a href="{{ route('compraComic', ['id' => 5]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
                </div>

                <div class="bg-white text-black p-6 rounded-lg shadow-lg flex flex-col items-center" id="6">
                    <img src="Daredevil Vol.01.jpeg" alt="Daredevil Vol.01" class="w-64 h-80 rounded mb-4 object-cover">
                    <h3 class="font-bold text-lg">Daredevil Vol.01</h3>
                    <p class="text-gray-700 text-lg">$1,235.00</p>
                    <span class="text-yellow-500 font-semibold">Pre-Venta</span>
                    <a href="{{ route('compraComic', ['id' => 6]) }}" class="mt-4 bg-yellow-400 text-black px-4 py-2 rounded select-product">Ver más</a>
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